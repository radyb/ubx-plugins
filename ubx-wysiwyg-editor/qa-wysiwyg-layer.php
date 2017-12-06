<?php

class qa_html_theme_layer extends qa_html_theme_base {

function head_script() {// insert Javascript into the <head>

  $hl  = 'ckeditor/plugins/codesnippet/lib/highlight/';
  $css = qa_html(QA_HTML_THEME_LAYER_URLTOROOT.$hl.'styles/default.css');
  $js  = qa_html(QA_HTML_THEME_LAYER_URLTOROOT.$hl.'highlight.pack.js');
	$this->content['script'][]= '<link href="'.$css.'" rel="stylesheet">';
  $this->content['script'][]= '<script type="text/javascript" src="'.$js.'"></script>';
  $this->content['script'][]= '<script type="text/javascript">hljs.initHighlightingOnLoad();</script>';
  qa_html_theme_base::head_script();
}

};
