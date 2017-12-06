<?php
/*********************************************************** {{{1 **********
 * Copyright © 2015 u-Blox
 ****************************************************************************
 * $Author: martin.krischik $
 * $Revision: 10047 $
 * $Date: 2015-09-10 10:07:25 +0200 (Thu, 10 Sep 2015) $
 * $Id: qa-plugin.php 10047 2015-09-10 08:07:25Z martin.krischik $
 * $HeadURL: http://svn.u-blox.ch/IT/DEV/projects/Forum/qa-plugin/ubx-ip-anchor-html/qa-plugin.php $
 ************************************************************ }}}1 *********/

/*
	Plugin Name: UBX Add country to ip links.
	Plugin URI:
	Plugin Description: Permit normal count view behind a reverse proxy
	Plugin Version: 1.0.0
	Plugin Date: 2013-05-24
	Plugin Author: Martin Krischik
	Plugin Author URI: https://wiki.u-blox.com/bin/view/Generic/MartinKrischik
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.5
	Plugin Update Check URI: http://svn.u-blox.ch/IT/DEV/projects/Forum/qa-plugin/ubx-ip-anchor-html
*/

// don't allow this page to be requested directly from browser
//
if (!defined ('QA_VERSION'))
{
	header ('Location: ../../');
	exit;
} // if

qa_register_plugin_overrides ('ubx-ip-anchor-html.php');

// vim: set wrap tabstop=8 shiftwidth=4 softtabstop=4 expandtab :
// vim: set textwidth=0 filetype=php foldmethod=marker nospell :
