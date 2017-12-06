<?php

/**
 * This is an override of the core function 'qa_page_q_post_rules'.
 * Adds another permissions check to see if the user has the right permit level for the category the question is in. 
 * If not the question will be blocked.
 * 
 * @see qa_page_q_post_rules() in core files
 */
function qa_page_q_post_rules($post, $parentpost=null, $siblingposts=null, $childposts=null)
{
	//setup vars and initiate ubxcat class
	$ubxcat = qa_load_module('process', 'ubxCat');
	$categoryid = $post['categoryid'];
	
	// run the original function and get all the info
	$rules=qa_page_q_post_rules_base($post, $parentpost, $siblingposts, $childposts);
	
	//check to see if user has permission to view the category, if not, then hide the question
	if (!$ubxcat->has_permit($categoryid))
		$rules['viewable']=0;

	return $rules;
}

function qa_log_in_external_user($source, $identifier, $fields) {
	qa_log_in_external_user_base($source, $identifier, $fields);
	
	// Now get back the created user id and email adress
	$email  = qa_get_logged_in_email();
	$level  = qa_get_logged_in_level();
	//error_log("FUNC: userid:".$userid." => email:".$email."!"." => level:".$level."!", 0);

	if( preg_match('/.*@u-blox\.com$/',$email) && $level<20 ) {
		//error_log("Setting permissions now to 20!", 0);
		$userid = qa_get_logged_in_userid();
		require_once QA_INCLUDE_DIR.'app/users-edit.php';
		$handle = qa_get_logged_in_handle();
		qa_set_user_level($userid, $handle, 20, 0);
		$ubxcat = qa_load_module('process', 'ubxCat');
		$ubxcat->edit_user_permit_level($userid, 20);
	}
}
