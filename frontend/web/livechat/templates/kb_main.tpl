<!DOCTYPE html>

<head>
    <META NAME="robots" CONTENT="index,follow">
    <title><!--config_gl_site_name--></title>
    <link rel="stylesheet" type="text/css" href="./templates/style_knowledgebase.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
    <script type="text/javascript" src="./templates/jscriptv24/kb.min.js"></script>
    <script type="text/javascript" src="./templates/jscriptv24/icons.min.js"></script>
    <script type="text/javascript" src="./templates/jscriptv24/jsglobal.min.js"></script>
</head>

<body onload="init();">

    <div id="lz_kb_main">

        <!--header-->

        <div id="lz_kb_h1"></div>
        <div id="lz_kb_h2">
            <div id="lz_kb_search_box">
                <form id="lz_kb_search_form" action="./knowledgebase.php" method="GET">
                    <input id="lz_kb_input" name="search-for" type="text" class="lz_form_box" value="<!--query-->" placeholder="<!--lang_client_kb_search_placeholder-->" onkeyup="if(event.keyCode==13){lz_kb.Search();}else if(event.keyCode==8 && document.getElementById('lz_kb_input').value==''){lz_kb.ResetSearch();}">
                    <input id="lz_kb_search" type="button" value="<!--lang_client_search-->" class="lz_form_button lz_chat_unselectable" onclick="lz_kb.Search();">
                    <!--params-->
                </form>
            </div>
        </div>
        <div id="lz_kb_results" class="lz_kb_center"><!--navigation--><!--results--></div>

        <!--footer-->

    </div>
</body>
</html>