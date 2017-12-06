<?php
/*********************************************************** {{{1 **********
 * Copyright © 2015 u-Blox
 ****************************************************************************
 * $Author: martin.krischik $
 * $Revision: 10141 $
 * $Date: 2015-09-30 13:40:47 +0200 (Mi, 30. Sep 2015) $
 * $Id: ubx-who-to-html.php 10141 2015-09-30 11:40:47Z martin.krischik $
 * $HeadURL: http://svn.u-blox.ch/IT/DEV/projects/Forum/qa-plugin/ubx-who-to-html/ubx-who-to-html.php $
 ************************************************************ }}}1 *********/

function Get_User_From_ID ($userid)
{
//	error_log ("+ Get_User_From_ID : " . "$userid = '$userid'");

	require_once QA_INCLUDE_DIR . 'qa-app-users.php';

	if (QA_FINAL_EXTERNAL_USERS)
	{
		$Retval = qa_get_public_from_userids (array ($userid));
	}
	else
	{
		$Retval = qa_db_single_select (qa_db_user_account_selectspec ($userid, true));
	} // if

//	error_log ("- Get_User_From_ID : " . "Retval = '" . var_export ($Retval, true) . "'");
	return $Retval;
} // Get_User_From_ID

function qa_who_to_html ($isbyuser, $postuserid, $usershtml, $ip = null, $microformats = false, $name = null)
{
//	error_log ("+ qa_who_to_html : " .
//		"isbyuser     = '$isbyuser' : " .
//		"postuserid   = '$postuserid' : " .
//		"usershtml    = '" . var_export ($usershtml, true) . "' : " .
//		"ip           = '$ip' : " .
//		"microformats = '$microformats' : " .
//		"name         = '$name'");

	$Retval = qa_who_to_html_base ($isbyuser, $postuserid, $usershtml, $ip, $microformats, $name);
	$Login_Level = qa_get_logged_in_level ();

//	error_log ("> Login_Level = $Login_Level ");

	if ($Login_Level >= QA_USER_LEVEL_EDITOR)
	{
		$User = Get_User_From_ID ($postuserid);
		$Country_Name = geoip_country_name_by_name ($User['loginip']);

		if (strlen ($Country_Name) > 0)
		{
			$Retval['suffix'] = "(" . $Country_Name . ")";
		} // if
	} // if

//	error_log ("- qa_who_to_html : " . "Retval = '" . var_export ($Retval, true) . "'");
	return $Retval;
} // qa_who_to_html

// vim: set wrap tabstop=8 shiftwidth=4 softtabstop=4 expandtab :
// vim: set textwidth=0 filetype=php foldmethod=marker nospell :
