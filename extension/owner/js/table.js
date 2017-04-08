$(document).ready(function(){
	(function(){
		var t = $('table.table-with-checkbox');
		t.on('change', 'tr th:first-child input:checkbox', function(){
			t.find('tr td input:checkbox').prop('checked', $(this).is(':checked'));
		});
		t.on('change', 'tr td:first-child input:checkbox', function(){
			t.find('tr th:first-child input:checkbox').prop('checked', t.find('tr td:first-child input:checkbox:not(:checked)').length == 0 ? true : false);
		});
		t.closest('form').on('submit', function(){
			if (!t.find('tr td:first-child input:checkbox:checked').length)
			{
				$.alert({title: 'Thông báo', content: 'Bạn phải chọn ít nhất một lựa chọn', type: 'red'});
				return false;
			}
		});
	}());
});
