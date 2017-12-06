<?php

/*
	Plugin Name: UBX Categories Plugin (based on permission2categories)
	Plugin URI: 
	Plugin Description: Defines category access
	Plugin Version: 1.0.
	Plugin Date: 2015-03-01
	Plugin Author: u-blox
	Plugin Author URI: http://u-blox.com/
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.5
	Plugin Update Check URI: 
*/


	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}
	
	qa_register_plugin_overrides('ubxcat_overrides.php');
	qa_register_plugin_layer('ubxcat_layer.php', 'Permissions 2 Categories Layer');
	qa_register_plugin_module('process', 'ubxcat-module.php', 'ubxcat_category_permission', 'ubxCat');
	

/*
	Omit PHP closing tag to help avoid accidental output
*/