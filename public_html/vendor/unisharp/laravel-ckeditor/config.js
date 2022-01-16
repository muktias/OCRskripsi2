/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#000000';

	// Construct path to file upload route
	// Useful if your dev and prod URLs are different
	var path = CKEDITOR.basePath.split('/');
	path[ path.length-2 ] = 'upload_image';
	config.filebrowserUploadUrl = path.join('/').replace(/\/+$/, '');
	
// 	config.toolbar = [
//     [ 'Undo', 'Redo' ],
//     [ 'Link', 'Unlink' ],
//     [ 'CmsImageManager', 'CmsFileManager', 'Table', 'SpecialChar', 'HorizontalRule' ],
//     [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', 'RemoveFormat' ],
//     [ 'NumberedList', 'BulletedList', 'Outdent', 'Indent' ],
//     '/',
//     [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ],
//     [ 'Styles', 'Format', 'Font', 'FontSize' ],
//     [ 'TextColor', 'BGColor' ],
//     [ 'Source', 'Maximize', 'ShowBlocks' ]
//     ];

	// Add plugin
	
	config.extraPlugins = 'button';
	config.extraPlugins = 'panel';
	config.extraPlugins = 'panelbutton';
	config.extraPlugins = 'floatpanel';
	config.extraPlugins = 'colorbutton';
	config.extraPlugins = 'font';
	config.extraPlugins = 'richcombo';
	config.extraPlugins = 'listblock';
	config.extraPlugins = 'filebrowser';
	
	config.extraPlugins = 'justify';

	   //  config.filebrowserBrowseUrl = '/templateEditor/kcfinder/browse.php?opener=ckeditor&type=files';

    // config.filebrowserImageBrowseUrl = '/templateEditor/kcfinder/browse.php?opener=ckeditor&type=images';

    // config.filebrowserFlashBrowseUrl = '/templateEditor/kcfinder/browse.php?opener=ckeditor&type=flash';

    // config.filebrowserUploadUrl = '/templateEditor/kcfinder/upload.php?opener=ckeditor&type=files';

    // config.filebrowserImageUploadUrl = '/templateEditor/kcfinder/upload.php?opener=ckeditor&type=images';

    // config.filebrowserFlashUploadUrl = '/templateEditor/kcfinder/upload.php?opener=ckeditor&type=flash';

    

};
