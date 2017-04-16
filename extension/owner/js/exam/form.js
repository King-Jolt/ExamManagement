$(document).ready(function () {
	var form = $('form#exam-form');
	CKEDITOR.replace('header');
	CKEDITOR.replace('footer', {
		height: 100
	});
	form.find('[name="date"]').datetimepicker({
		sideBySide: true,
		format: 'DD-MM-YYYY HH:mm A'
	});
	$.validator.addMethod('datetime', function (value, element, flag) {
		return flag === true ? moment(value, 'DD-MM-YYYY HH:mm:ss').isValid() : true;
	});
	form.find('[name="set-date"]').on('change', function () {
		$(this).parents('form').find('[name="date"]').prop('disabled', $(this).is(':not(:checked)'));
	}).trigger('change');
	form.validate({
		rules: {
			title: {
				required: true
			},
			date: {
				datetime: true
			}
		},
		messages: {
			title: {
				required: 'Bạn phải nhập tên đề thi'
			},
			date: {
				datetime: 'Sai định dạng ! Vui lòng nhập lại'
			}
		},
		errorClass: 'text-danger'
	});
});
