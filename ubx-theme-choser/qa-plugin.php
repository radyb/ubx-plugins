<?php
/*********************************************************** {{{1 **********
 * Copyright © 2015 u-Blox
 ****************************************************************************
 * $Author: martin.krischik $
 * $Revision: 10141 $
 * $Date: 2015-09-30 13:40:47 +0200 (Wed, 30 Sep 2015) $
 * $Id: qa-plugin.php 10141 2015-09-30 11:40:47Z martin.krischik $
 * $HeadURL: http://svn.u-blox.ch/IT/DEV/projects/Forum/qa-plugin/ubx-who-to-html/qa-plugin.php $
 ************************************************************ }}}1 *********/

/*
	Plugin Name: UBX theme choser
	Plugin URI:
	Plugin Description: allow to select the theme by qa_theme argument in url
	Plugin Version: 1.0.0
	Plugin Date: 2017-11-14
	Plugin Author: Michael Ammann
	Plugin Author URI: https://wiki.u-blox.com/bin/view/Generic/MichaelAmmann
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.5
	Plugin Update Check URI: http://svn.u-blox.ch/IT/DEV/projects/Forum/qa-plugin/ubx-theme-choser
*/

// don't allow this page to be requested directly from browser
//
if (!defined ('QA_VERSION'))
{
	header ('Location: ../../');
	exit;
} // if

qa_register_plugin_overrides ('ubx-theme-choser.php');

// vim: set wrap tabstop=8 shiftwidth=4 softtabstop=4 expandtab :
// vim: set textwidth=0 filetype=php foldmethod=marker nospell :
