<?php

class qa_html_theme_layer extends qa_html_theme_base
{
	/**
	 * (Adds the field to select a permission level for the category)
	 *
	 * @see qa_html_theme_base::doctype()
	 */

	function doctype()
	{
		//error_log("Request: ".$this->request." and edit is:".qa_get('state'), 0);
		$permitoptions = array(
				0   => 'None',
				10 	=> 'NDA required',
				20 	=> 'u-blox internal'
				);

		if( $this->request == 'admin/categories' &&  qa_get('edit') >= 1 ) {
			$ubxcat = qa_load_module('process', 'ubxCat');
			$categoryvalue = $permitoptions[$ubxcat->category_permit_level(qa_get('edit'))];

			$this->content['form']['fields'][] = array(
					'tags' => 'NAME="ubxcat_permit_level" ID="ubxcat_form"',
					'label' => 'Select permission level requirement',
					'type' => 'select',
					'options' => $permitoptions,
					'value' => $categoryvalue
					);
		}


		if( preg_match('/^user\/([^\/]*)$/',$this->request, $matches) ) {
			// :mkri: error_log("!!!!!! doctype: " . $this->request, 0);

			require_once QA_INCLUDE_DIR.'qa-db-metas.php';
			$userID = qa_handle_to_userid($matches[1]);
			$current_user_level = intval(qa_db_usermeta_get($userID, 'security_level'));
			if (qa_get_state() == 'edit' && qa_get_logged_in_level() >= QA_USER_LEVEL_ADMIN) {
				//error_log("In user here...", 0);
				$this->content['form_profile']['fields'] = array_slice($this->content['form_profile']['fields'], 0, 3, true) +
					array("catlevel" => array(
					'label' => 'Access Level',
					'tags' => 'name="ubxcat_userconf_level"',
					'type' => 'select',
					'options' => $permitoptions,
					'value' => $permitoptions[$current_user_level],
					'id' => 'ubxcat_userconf_level'
				)) +
					array_slice($this->content['form_profile']['fields'], 3, count($this->content['form_profile']['fields']) - 1, true) ;

				$this->content['form_profile']['hidden']['uid'] = $userID;
			}
			else {
				// Just add the view...
				if (qa_get_logged_in_level() >= QA_USER_LEVEL_ADMIN) {
					$this->content['form_profile']['fields'] = array_slice($this->content['form_profile']['fields'], 0, 3, true) +
						array("catlevel" => array(
						'label' => 'Access Level',
						'tags' => 'name="ubxcat_userconf_level"',
						'type' => 'static',
						'value' => $permitoptions[$current_user_level]
					)) +
						array_slice($this->content['form_profile']['fields'], 3, count($this->content['form_profile']['fields']) - 1, true) ;
				}
			}
		}
		qa_html_theme_base::doctype();
	}


	/**
	 * Adds a layer for a permission check to the question list. If user does not have the permission to view the category the question is not sent to output.
	 *
	 * @see qa_html_theme_base::q_list_item()
	 */
	function q_list_item($q_item)
	{
		$ubxcat = qa_load_module('process', 'ubxCat');
		$categoryid = $q_item['raw']['categoryid'];

		if ($ubxcat->has_permit($categoryid))
			qa_html_theme_base::q_list_item($q_item);
	}

	public function nav_list($navigation, $class, $level=null)
	{
    $show = 1;
    if (($class == 'nav-cat' || $class == 'browse-cat'))
    {
      $count = 0;
      $ubxcat = qa_load_module('process', 'ubxCat');
		  foreach ($navigation as $key => $navlink) {
        if (isset($navlink['categoryid']) && $ubxcat->has_permit($navlink['categoryid']))
           $count ++;
      }
      $show = ($count > 0);
    }
    if ($show)
       qa_html_theme_base::nav_list($navigation, $class, $level);
	}

	/**
	 * Adds a layer for a permission check to the category list. If user does not have the permission to view the category the category list item is not sent to output.
	 *
	 * @see qa_html_theme_base::nav_item()
	 */
	function nav_item($key, $navlink, $class, $level=null)
	{
		$ubxcat = qa_load_module('process', 'ubxCat');

		if ( isset($navlink['categoryid']) && ($class == 'nav-cat' || $class == 'browse-cat') ) {
			$categoryid = $navlink['categoryid'];

			if ($ubxcat->has_permit($categoryid))
				qa_html_theme_base::nav_item($key, $navlink, $class, $level=null);
		}

		if ( !isset($navlink['categoryid']) ) //if the navlink is not a category use parent class method.
			qa_html_theme_base::nav_item($key, $navlink, $class, $level=null);
	}
}