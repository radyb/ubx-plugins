<?php
/*********************************************************** {{{1 **********
* Copyright © 2015 u-Blox
****************************************************************************
* $Author: martin.krischik $
* $Revision: 10052 $
* $Date: 2015-09-10 10:30:26 +0200 (Thu, 10 Sep 2015) $
* $Id: ubx-ip-anchor-html.php 10052 2015-09-10 08:30:26Z martin.krischik $
* $HeadURL: http://svn.u-blox.ch/IT/DEV/projects/Forum/qa-plugin/ubx-ip-anchor-html/ubx-ip-anchor-html.php $
************************************************************ }}}1 *********/

/**
 *   Return HTML to use for $ip address, which links to appropriate page with $anchorhtml
 */
function qa_ip_anchor_html ($ip, $anchorhtml = null)
{
//	$ip= "151.91.37.66";
//	error_log ("+ qa_ip_anchor_html : " . "ip = '$ip' : " . "anchorhtml = '$anchorhtml'");

	$Retval = qa_ip_anchor_html_base ($ip, $anchorhtml);
	$Country_Name = geoip_country_name_by_name ($ip);
	if (strlen($Country_Name) > 0)
	{
		$Retval = $Retval . " (" . $Country_Name . ")";
	} // if

//	error_log ("- qa_ip_anchor_html : " . "Retval = '$Retval'");
	return $Retval;
} // qa_ip_anchor_html

// vim: set wrap tabstop=8 shiftwidth=4 softtabstop=4 expandtab :
// vim: set textwidth=0 filetype=php foldmethod=marker nospell :
