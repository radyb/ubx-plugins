<?php
  
class welcome_widget
{
	// See http://docs.question2answer.org/plugins/modules-widget/
		
	public function allow_template($template)
	{
		$allowed = array('qa');
		return in_array($template, $allowed);
	}

	public function allow_region($region)
	{
		$allowed = array('main', 'side', 'full');
		return in_array($region, $allowed);
	}
	
	public function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
	{
		$themeobject->output('<div class="qa-body-wrapper">'.
					 		 '<div class="welcome-widget">'.
							 qa_opt('ubx_welcome_text').
							 '</div>'.
							 '</div>');
	}
	
	public function option_default($option)
	{
		if ($option === 'ubx_welcome_text') {
			return "<h1>u-blox Support Community</h1>".
			"<p>Find answers, ask questions and connect with our community of u-blox users from around the world</p>";
		}
	}

	public function admin_form()
	{
		$saved = qa_clicked('ubx_welcome_save_button');

		if ($saved) {
			qa_opt('ubx_welcome_text', qa_post_text('ubx_welcome_text_field'));
		}

		return array(
			'ok' => $saved ? 'Tag cloud settings saved' : null,

			'fields' => array(
				array(
					'label' => 'Welcome text to show',
					'type' => 'textarea',
					'rows' => 10,
					'value' => qa_opt('ubx_welcome_text'),
					'suffix' => 'html',
					'tags' => 'name="ubx_welcome_text_field"'
				),
			),

			'buttons' => array(
				array(
					'label' => 'Save Changes',
					'tags' => 'name="ubx_welcome_save_button"',
				),
			),
		);
	}
}
