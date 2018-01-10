<?php
  
/*
	Question2Answer by Gideon Greenspan and contributors
	http://www.question2answer.org/

	File: qa-include/qa-widget-ask-box.php
	Description: Widget module class for ask a question box


	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.question2answer.org/license.php
*/

class search_widget
{
	public function allow_template($template)
	{
		$allowed = array(
			'activity', 'categories', 'custom', 'feedback', 'qa', 'questions',
			'hot', 'search', 'tag', 'tags', 'unanswered'
		);
		return in_array($template, $allowed);
	}

	public function allow_region($region)
	{
		return in_array($region, array('main', 'side', 'full'));
	}

	public function output_widget($region, $place, $themeobject, $template, $request, $qa_content)
	{
		$search= $qa_content['search'];
		$themeobject->output(
			'<div class="search-container">'.
			'<div class="qa-body-wrapper">'.
			'<div class="search-widget">'.
			'<form class="search-widget-form" role="form" '.$search['form_tags'].'>',
			@$search['form_extra']
		);

		$themeobject->search_field($search);
		//$themeobject->search_button($search);

		$themeobject->output(
			'</form>'.
			'<a href="'.qa_path_html('usage',null).'">Learn more about Support Communities</a>'. 
			'</div>'.
			'</div>'.
			'</div>'
		);
	}
}
