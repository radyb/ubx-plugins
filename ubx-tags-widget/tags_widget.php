<?php

class tags_widget
{
	// See http://docs.question2answer.org/plugins/modules-widget/
	
	public function allow_template($template)
	{
		$allowed = array(
			'activity', 'qa', 'questions', 'hot', 'ask', 'categories', 'question',
			'tag', 'tags', 'unanswered', 'user', 'users', 'search', 'admin', 'custom',
		);
		return in_array($template, $allowed);
	}

	public function allow_region($region)
	{
		$allowed = array(
			'side', 'main', 'full'
		);
		return in_array($region, $allowed);
	}

	public function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
	{
		require_once QA_INCLUDE_DIR.'db/selects.php';
		$populartags = qa_db_single_select(qa_db_popular_tags_selectspec(0, (int)qa_opt('ubx_tags_count')));
		$maxcount = reset($populartags);
		$themeobject->output(sprintf('<h2>%s</h2>', qa_lang_html('main/popular_tags')));
		$themeobject->output('<div>');
		$blockwordspreg = qa_get_block_words_preg();
		foreach ($populartags as $tag => $count) {
			$matches = qa_block_words_match_all($tag, $blockwordspreg);
			if (empty($matches)) {
				$themeobject->output(sprintf('<a href="%s">%s</a>', qa_path_html('tag/' . $tag), qa_html($tag)));
			}
		}
		$themeobject->output('</div>');
	}

	public function option_default($option)
	{
		if ($option === 'ubx_tags_count')
			return 30;
	}

	public function admin_form()
	{
		$saved = qa_clicked('ubx_tags_save_button');

		if ($saved) {
			qa_opt('ubx_tags_count', (int)qa_post_text('ubx_tags_count_filed'));
		}

		return array(
			'ok' => $saved ? 'Tag cloud settings saved' : null,

			'fields' => array(
				array(
					'label' => 'Maximum tags to show:',
					'type' => 'number',
					'value' => (int) qa_opt('ubx_tags_count'),
					'suffix' => 'tags',
					'tags' => 'name="ubx_tags_count_filed"',
				),
			),

			'buttons' => array(
				array(
					'label' => 'Save Changes',
					'tags' => 'name="ubx_tags_save_button"',
				),
			),
		);
	}
}
