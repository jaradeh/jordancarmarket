<?php
/****************************************************************************************
 * LiveZilla upload.php
 *
 * Copyright 2018 LiveZilla GmbH
 * All rights reserved.
 * LiveZilla is a registered trademark.
 *
 * Improper changes to this file may cause critical errors.
 ***************************************************************************************/

define("IN_LIVEZILLA",true);
header('Content-Type: text/html; charset=utf-8');
if(!defined("LIVEZILLA_PATH"))
    define("LIVEZILLA_PATH","./");

require(LIVEZILLA_PATH . "_definitions/definitions.inc.php");
require(LIVEZILLA_PATH . "_lib/functions.global.inc.php");
require(LIVEZILLA_PATH . "_definitions/definitions.dynamic.inc.php");
require(LIVEZILLA_PATH . "_definitions/definitions.protocol.inc.php");

@set_error_handler("handleError");
if(Server::InitDataProvider())
{
    $bId = null;
    $uId = null;
    $chat = null;
    $gId = Communication::ReadParameter("gid","");
    $visitor = null;
    $fInd = 1;

    // load chat
    if(isset($_REQUEST["cid"]) && !empty($_REQUEST["cid"]))
    {
        $chat = VisitorChat::GetByChatId(Communication::ReadParameter("cid",0));
        if($chat != null)
        {
            $uId = $chat->UserId;
            $bId = $chat->BrowserId;
            $visitor = new Visitor($uId);
            $visitor->Load();
            $visitor->LoadVisitorData();
        }
    }

    // load visitor
    if(isset($_REQUEST["bid"]) && !empty($_REQUEST["bid"]) && isset($_REQUEST["uid"]) && !empty($_REQUEST["uid"]) && isset($_REQUEST["find"]))
    {
        $uId = Communication::ReadParameter("uid","");
        $bId = Communication::ReadParameter("bid","");
        $fInd = Communication::ReadParameter("find",0);

        if(strlen($bId) <= USER_ID_LENGTH+4 && strlen($uId) == USER_ID_LENGTH && strlen($fInd)<4)
        {
            $visitor = new Visitor($uId);
            $visitor->Load();
            $visitor->LoadVisitorData();
        }
        else
            exit("503.1");
    }

    if(!empty(Server::$Configuration->File["gl_vmac"]) && !($visitor != null && Communication::GetIP() == $visitor->IP))
        exit("503.3");

    if(!empty($visitor->Closed))
        exit("503.4");

    $html = IOStruct::GetFile(PATH_TEMPLATES . "upload.tpl");
    $html = str_replace("<!--upload-->",IOStruct::GetFile(PATH_TEMPLATES . "file_upload.tpl"),$html);
    $html = str_replace("<!--bgc-->",Communication::ReadParameter("etc","#7a7a7a"),$html);

    Server::InitDataBlock(array("GROUPS","INPUTS"));

    if(!isset(Server::$Groups[$gId]))
        exit("503.18");

    if($chat != null)
    {
        // chat fu
        if(empty(Server::$Groups[$gId]->ChatFunctions[5]))
            exit("503.19");

        if($chat->ExternalClosed || $chat->InternalClosed)
            exit("503.20");

        if(isset($_FILES["form_userfile"]))
        {
            if(StoreFileChat($visitor->UserId,$chat->GetHostOperator(),$visitor->VisitorData->Fullname,$chat))
            {
                exit("lz_chat_file_ready();");
            }
            else
                exit("lz_chat_file_error(2);");
        }
        else
        {
            if(!empty($_POST["p_iu"]))
            {
                exit("lz_chat_file_start_upload();");
            }
        }

        $html = str_replace("<!--cid-->",Encoding::Base64UrlEncode($chat->ChatId),$html);
        $html = str_replace("<!--chat_id-->",Encoding::Base64UrlEncode($chat->ChatId),$html);
        $html = str_replace("<!--bid-->",Encoding::Base64UrlEncode(""),$html);
        $html = str_replace("<!--uid-->",Encoding::Base64UrlEncode(""),$html);
        $html = str_replace("<!--gid-->",Encoding::Base64UrlEncode($chat->GroupId),$html);
    }
    else
    {
        // ticket fu
        if(!isset(Server::$Inputs[$fInd]))
            exit("503.20");

        if(!Server::$Inputs[$fInd]->Active)
            exit("503.21");

        if(isset($_FILES["form_userfile"]))
        {
            $fileId = "";
            $fileName = "";

            if(StoreFileTicket($uId,$fInd,$fileId,$fileName))
            {
                exit("lz_chat_file_ready();");
            }
            else
                exit("lz_chat_file_error(2);");

        }
        else if(!empty($_POST["p_iu"]))
        {
            exit("lz_chat_file_start_upload();");
        }

        $html = str_replace("<!--cid-->",Encoding::Base64UrlEncode(""),$html);
        $html = str_replace("<!--chat_id-->",Encoding::Base64UrlEncode(""),$html);
        $html = str_replace("<!--bid-->",Encoding::Base64UrlEncode($bId),$html);
        $html = str_replace("<!--uid-->",Encoding::Base64UrlEncode($uId),$html);
        $html = str_replace("<!--gid-->",Encoding::Base64UrlEncode($gId),$html);
    }


    $html = str_replace("<!--find-->",Encoding::Base64UrlEncode($fInd),$html);
    $html = str_replace("<!--action-->","lz_chat_file_init_upload();",$html);
    $html = str_replace("<!--connector_script-->",IOStruct::GetFile(TEMPLATE_SCRIPT_CONNECTOR),$html);
    $html = str_replace("<!--mwidth-->","max-width:90%;",$html);
    exit(Server::Replace($html));
}




function StoreFileTicket($_userId,$_fInd,&$_fId,&$_fName)
{
    $fileid = GetFileId();

    if($fileid === false)
        return false;

    $filemask = GetFileMask($fileid);

    if(move_uploaded_file($_FILES["form_userfile"]["tmp_name"], PATH_UPLOADS . $filemask))
    {
        KnowledgeBase::CreateEntry($_userId."_".$_fInd, $fileid, $filemask, 3, $_FILES["form_userfile"]["name"], 0, 100, $_FILES["form_userfile"]["size"]);
        $_fId = $fileid;
        $_fName = IOStruct::GetNamebase($_FILES['form_userfile']['name']);
        return true;
    }
    return false;
}

function StoreFileChat($_userId,$_partner,$_fullname,$_chat)
{
    $fileid = GetFileId();

    if($fileid === false)
        return false;

    $filemask = GetFileMask($fileid);

    if(empty($_fullname))
    {
        LocalizationManager::AutoLoad();
        $_fullname = LocalizationManager::$TranslationStrings["client_guest"] . " " . Visitor::GetNoName($_userId.Communication::GetIP());
    }
    if(move_uploaded_file($_FILES["form_userfile"]["tmp_name"], PATH_UPLOADS . $filemask))
    {
        KnowledgeBase::CreateFolders($_partner,false);
        KnowledgeBase::CreateEntry($_partner, $_userId, $_fullname, 0, $_fullname, 0, 5);
        KnowledgeBase::CreateEntry($_partner, $fileid, $filemask, 4, $_FILES["form_userfile"]["name"], 0, $_userId, $_FILES["form_userfile"]["size"]);

        foreach($_chat->Members as $mem)
        {
            $post = new Post(getId(32),$_chat->SystemId,$mem->SystemId,$_FILES["form_userfile"]["name"]."[__[file:".$fileid."]__]",time(),$_chat->ChatId,$_fullname);
            $post->ReceiverGroup = $_chat->SystemId;
            $post->Save();
        }

        return true;
    }
    return false;
}

function GetFileId()
{
    $filename = IOStruct::GetNamebase($_FILES['form_userfile']['name']);

    Logging::SecurityLog("Upload::UploadFile",$filename);

    if(!IOStruct::IsValidUploadFile($filename))
        return false;
    else
    {
        $fileid = getId(32);
        return $fileid;
    }
}

function GetFileMask($_fileId)
{
    return getId(10) . "_" . $_fileId;
}

?>