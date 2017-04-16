$(document).ready(function () {
	CKEDITOR.plugins.addExternal('fill', '/extension/ckeditor4/plugins/fill/', 'plugin.js');
	CKEDITOR.config.extraPlugins = 'fill';
	CKEDITOR.replace('content', { toolbarStartupExpanded: true, startupFocus: true } );
});
