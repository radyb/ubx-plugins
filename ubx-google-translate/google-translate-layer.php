<?php

class qa_html_theme_layer extends qa_html_theme_base {

function head_script() {// insert Javascript into the <head>
  if (qa_opt('google_translate_enable')) {
    $this->content['script'][] = '<style type="text/css">iframe.goog-te-banner-frame { display:none !important; }</style>';
    $this->content['script'][] = '<style type="text/css">body {position: static !important; top: 0 !important;}</style>';
    $js  = qa_html(QA_HTML_THEME_LAYER_URLTOROOT.'init.js');
    $this->content['script'][]= '<script type="text/javascript" src="'.$js.'"></script>';
    $google  = 'https://translate.google.com/translate_a/element.js';
    $this->content['script'][]='<script type="text/javascript" src="'.qa_html($google.'?cb=_GoogleTranslateInit').'"></script>';
    $this->content['script'][]='<meta name="google-translate-customization" content="e198849b25c0c09a-88ef2351755d1482-gcf0261dfa736f06e-1f"></meta>';
  }
  qa_html_theme_base::head_script();
}

};
