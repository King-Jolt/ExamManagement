$(document).ready(function(){
	(function(){
		$('form.require-checkbox-from-table').on('update-state', function(){
			$(this).find(':button:submit').prop(
				'disabled',
				$(this).find('table tr td:first-child input:checkbox:checked').length ? false : true
			);
		}).trigger('update-state');
		$('form.require-checkbox-from-table').on('change', 'table tr th:first-child input:checkbox', function(){
			var t = $(this).closest('table');
			t.find('tr td input:checkbox').prop('checked', $(this).is(':checked'));
			t.closest('form').trigger('update-state');
		});
		$('form.require-checkbox-from-table').on('change', 'table tr td:first-child input:checkbox', function(){
			var t = $(this).closest('table');
			t.find('tr th:first-child input:checkbox').prop(
				'checked',
				t.find('tr td:first-child input:checkbox:not(:checked)').length ? false : true
			);
			t.trigger('update-state');
		});
	}());
});
