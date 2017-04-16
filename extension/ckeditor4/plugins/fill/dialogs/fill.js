CKEDITOR.dialog.add('fillDialog', function (editor) {
	return {

		// Basic properties of the dialog window: title, minimum size.
		title: 'Chỉnh sửa từ khuyết',
		minWidth: 400,
		minHeight: 200,

		// Dialog window content definition.
		contents: [
			{
				// Definition of the Basic Settings dialog tab (page).
				id: 'tab-basic',
				label: 'Basic Settings',

				// The tab content.
				elements: [
					{
						// text input field
						type: 'text',
						id: 'fill',
						label: 'Hide Word',

						// Validation checking whether the field is not empty.
						validate: CKEDITOR.dialog.validate.notEmpty("Hide Word cannot be empty."),

						// Called by the main setupContent method call on dialog initialization.
						setup: function (element) {
							this.setValue(element.getText());
						},

						// Called by the main commitContent method call on dialog confirmation.
						commit: function (element) {
							element.setText(this.getValue());
						}
					}
				]
			}
		],

		// Invoked when the dialog is loaded.
		onShow: function () {
			// Get the selection from the editor.
			var selection = editor.getSelection();

			// Get the element at the start of the selection.
			var element = selection.getStartElement();
			
			// Get the <data-fill> element closest to the selection, if it exists.
			if (element)
				element = element.getAscendant('span', true);
			// Create a new <data-fill> element if it does not exist.
			if (!element || (element.getName() !== 'span' && !element.hasClass('data-fill'))) {
				//console.log(editor.getSelection().getSelectedText());
				element = editor.document.createElement('span');
				element.setText(editor.getSelection().getSelectedText());
			
				// Flag the insertion mode for later use.
				this.insertMode = true;
			} else
				this.insertMode = false;

			// Store the reference to the <data-fill> element in an internal property, for later use.
			this.element = element;

			this.setupContent(this.element);
				
		},

		// This method is invoked once a user clicks the OK button, confirming the dialog.
		onOk: function () {

			// The context of this function is the dialog object itself.
			// http://docs.ckeditor.com/#!/api/CKEDITOR.dialog
			var dialog = this;

			// Create a new <span fill-data> element.
			var fill = this.element;

			fill.setAttribute('class', 'data-fill');
			
			// Invoke the commit methods of all dialog window elements, so the <data-fill> element gets modified.
			this.commitContent(fill);

			// Finally, if in insert mode, insert the element into the editor at the caret position.
			if (this.insertMode)
				editor.insertElement(fill);
		}
	};
});
