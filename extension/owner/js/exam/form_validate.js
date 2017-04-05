$(document).ready(function(){
	var form = $('form.exam-form');
	if (form.length)
	{
		form.find('[name="date"]').datetimepicker({
			inline: true,
			sideBySide: true,
			format: 'DD-MM-YYYY HH:mm:ss'
		});
		form.find('[name="header"]').val($('#template-header').html());
		form.find('[name="footer"]').val("<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\"><tbody><tr><td style=\"text-align:center\"><strong>---------------------------------------- H\u1EBET&nbsp;----------------------------------------<\/strong><\/td><\/tr><tr><td style=\"text-align:center\"><em>Th\u00ED sinh kh\u00F4ng \u0111\u01B0\u1EE3c ph\u00E9p s\u1EED d\u1EE5ng t\u00E0i li\u1EC7u<\/em><\/td><\/tr><\/tbody><\/table>\u200B\u200B\u200B\u200B\u200B");
		$.validator.addMethod('datetime', function(value, element, flag){
			return flag === true ? moment(value, 'DD-MM-YYYY HH:mm:ss').isValid() : true;
		});
		form.find('[name="set-date"]').on('change', function(){
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
	}
});
