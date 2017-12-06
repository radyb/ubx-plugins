<?php
  
class google_translate_admin_form {
  const DIV_ITEM_ID = '_GoogleTranslateElem';
  public function allow_template($template)
	{
		return ($template!='admin');
	}

	public function allow_region($region)
	{
		return in_array($region, array('main', 'side', 'full'));
	}
  
  function admin_form() {
        $saved=false;
          
        if (qa_clicked('google_translate_save_button')) {
            qa_opt('google_translate_enable', (bool)qa_post_text('google_translate_enable_field'));
            $saved=true;
        }

        return array(
            'ok' => $saved ? 'Google Translate settings saved.' : null,

            'fields' => array(
            
                array(
                    'label' => 'Enable Google Translate',
                    'type' => 'checkbox',
                    'value' => qa_opt('google_translate_enable'),
                    'tags' => 'NAME="google_translate_enable_field"',
                    'note' => 'In the <a href="/index.php?qa=admin&qa_1=layout">Layout Configuration</a> '.
                              'enable the Widget or insert the the folowing html code somewhere in the page using Custom HTML '.
                              '<pre>&ltdiv id="'.self::DIV_ITEM_ID.'"&gt&lt/div&gt</pre>',
	                  ),
            ),

            'buttons' => array(
                array(
                    'label' => 'Save Changes',
                    'tags' => 'NAME="google_translate_save_button"',
                ),
            ),

        );
    }
	public function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
	{
    $themeobject->output('<div class="qa-translate-box" id="'.self::DIV_ITEM_ID.'">Please always ask in English.</div>');
	}
}