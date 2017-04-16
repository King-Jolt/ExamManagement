CKEDITOR.plugins.add('fill', {
	icons: 'fill',
	init: function (editor) {
		editor.addContentsCss( this.path + 'styles/fill.css' );
		editor.addCommand('fill', new CKEDITOR.dialogCommand('fillDialog'));
		editor.ui.addButton('Fill', {
			label: 'Thêm từ khuyết',
			command: 'fill',
			toolbar: 'about'
		});
		if (editor.contextMenu) {
			editor.addMenuGroup('fillGroup');
			editor.addMenuItem('fillItem', {
				label: 'Sửa dữ liệu',
				icon: this.path + 'icons/fill.png',
				command: 'fill',
				group: 'fillGroup'
			});

			editor.contextMenu.addListener(function (element) {
				if (element.hasClass('data-fill') && element.getAscendant('span', true)) {
					return {fillItem: CKEDITOR.TRISTATE_OFF};
				}
			});
		}

		// Register our dialog file -- this.path is the plugin folder path.
		CKEDITOR.dialog.add('fillDialog', this.path + 'dialogs/fill.js');
	}
});
