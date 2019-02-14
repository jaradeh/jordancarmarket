/****************************************************************************************
 * LiveZilla kb.js
 *
 * Copyright 2016 LiveZilla GmbH
 * All rights reserved.
 * LiveZilla is a registered trademark.
 *
 ***************************************************************************************/

function KBClass() {
    this.m_Config = null;
}

KBClass.prototype.Search = function() {
    document.getElementById('lz_kb_search_form').submit();
};

var lz_kb = null;

function init(){
    lz_kb = new KBClass();

    var rhtml = document.getElementById('lz_kb_results').innerHTML;
    rhtml = rhtml.replace('<!--icon_yes-->',lz_get_icon('','thumbs-o-up','',''));
    rhtml = rhtml.replace('<!--icon_no-->',lz_get_icon('','thumbs-o-down','',''));
    document.getElementById('lz_kb_results').innerHTML = rhtml;

    if(document.getElementById('lz_kb_date') !== null)
        document.getElementById('lz_kb_date').innerHTML = lz_chat_get_locale_date(document.getElementById('lz_kb_date').innerHTML);
}



