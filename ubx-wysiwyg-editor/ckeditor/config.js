/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// NOTE: if you make changes to this file, make sure that you do not overwrite it when upgrading Q2A!
 
  // load in extra plugins, also added Youtube,CodeSnippet and Source buttons below 
  config.extraPlugins        = 'codesnippet,lineutils,widget,youtube,sourcearea';
  // for youtube we need to set some defaults
  config.youtube_privacy     = false;
  config.youtube_related     = false;
  config.youtube_responsive  = true;
  config.allowedContent      = true;         // allow for iframe
  config.extraAllowedContent = 'iframe[*]';  // allow for iframe
    
	// The toolbar arrangement, two rows of buttons
	config.toolbar = [
		{ name: 'basic', 	    items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
		{ name: 'color', 	    items: [ 'TextColor', 'BGColor' ] },
		{ name: 'align', 	    items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
		{ name: 'clipboard',	items: [ 'Cut', 'Copy', 'Paste', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
		{ name: 'raw',	      items: [ 'Source' ] },
    '/',
		{ name: 'font', 	    items: [ 'Font', 'FontSize', 'Format' ] },
		{ name: 'paragraph',	items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', 'Blockquote' ] },
		{ name: 'links',	    items: [ 'Link', 'Unlink' ] },
    { name: 'insert',	    items: [ 'Image', 'Youtube', 'Table', 'HorizontalRule', 'SpecialChar', 'CodeSnippet' ] },
		{ name: 'last',	      items: [ 'Maximize' ] }
	];

	// Set the most common block elements
	config.format_tags          = 'p;h1;h2;h3;pre';
	config.entities             = false;

	// Make dialogs simpler
	config.removeDialogTabs     = 'image:advanced;link:advanced;table:advanced';

	// Use native spell checking (note: Ctrl+right-click is required for native context menu)
	config.disableNativeSpellChecker = false;
};
