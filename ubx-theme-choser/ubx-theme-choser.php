<?php
/*********************************************************** {{{1 **********
* Copyright © 2015 u-Blox
****************************************************************************
* $Author: mario.karimovic $
* $Revision: 16435 $
* $Date: 2017-11-09 09:08:16 +0100 (Thu, 09 Nov 2017) $
* $Id: ubx-ip-anchor-html.php 16435 2017-11-09 08:08:16Z mario.karimovic $
* $HeadURL: http://svn.u-blox.ch/IT/DEV/projects/Forum/qa-plugin/ubx-ip-anchor-html/ubx-ip-anchor-html.php $
************************************************************ }}}1 *********/

function qa_get_site_theme() 
{ 
	$qa_theme = qa_get('qa_theme'); 
	if (isset($qa_theme))
		return $qa_theme;
	return qa_get_site_theme_base(); 
}

function qa_path($request, $params=null, $rooturl=null, $neaturls=null, $anchor=null) 
{ 
	$qa_theme = qa_get('qa_theme');
	if (isset($qa_theme))
		@$params['qa_theme'] = $qa_theme;
	return qa_path_base($request, $params, $rooturl, $neaturls, $anchor); 
}

// vim: set wrap tabstop=8 shiftwidth=4 softtabstop=4 expandtab :
// vim: set textwidth=0 filetype=php foldmethod=marker nospell :
