﻿/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';


	config.language = 'zh-cn';
	config.toolbar = 'title';
	config.autoUpdateElement = true;

	    config.toolbar_title =
	    [
	     ['Source','FontSize','TextColor','RemoveFormat','Bold'],
	    ];
	    
	    config.toolbar = 'Admin';
	    config.toolbar_Admin = [
	                                  	['Source','Undo','Bold','Italic','Underline','Strike','Subscript','Superscript','NumberedList','BulletedList','Link','Unlink','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Image','Flash','SpecialChar','PageBreak','TextColor','BGColor','Maximize','RemoveFormat','Table','Font','FontSize'],
	                                  ] ;
		config.toolbar_Front = [
	                                  	['Undo','Bold','Italic','Underline','Strike','NumberedList','BulletedList','Link','Unlink','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Image','Flash','SpecialChar','TextColor','BGColor','Maximize','RemoveFormat','Table','Font','FontSize'],
	                                  ] ;	                                  
	    config.resize_enabled = false;
	    config.entities = false;
	    config.ignoreEmptyParagraph = false;
	    config.startupOutlineBlocks = true;
	    config.font_names = 'Arial;Times New Roman;Verdana;宋体;黑体;微软雅黑';
			config.disableNativeTableHandles = true;
};
