<?php

/*

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

/*
	Plugin Name: UBX Search Widget
	Plugin URI: 
	Plugin Update Check URI: 
	Plugin Description: u-blox Search Widget
	Plugin Version:0.1
	Plugin Date: 2017-11-20
	Plugin Author: u-blox
	Plugin Author URI: 
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.7
*/


	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}

  	qa_register_plugin_module('widget', 'search_widget.php', 	'search_widget', 	'UBX Search Widget');

/*
	Omit PHP closing tag to help avoid accidental output
*/