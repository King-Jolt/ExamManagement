<link rel="stylesheet" href="/extension/datetimepicker/css/bootstrap-datetimepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script src="/extension/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<div>
	<form method="post" class="panel panel-info" id="add-exam" role="dialog">
		<div class="panel-heading">
			<h4 class="modal-title"> Nhập thông tin cho đề thi </h4>
		</div>
		<div class="panel-body">
			<div class="form-hint"></div>
			<label> Tên đề thi </label>
			<div class="form-group">
				<input type="text" name="title" placeholder="Nhập tên đề thi" class="form-control" autocomplete="off" autofocus />
			</div>
			<label> Header </label>
			<div class="form-group">
				<input type="text" name="header" placeholder="Nội dung" class="form-control use-ckeditor" autocomplete="off" />
			</div>
			<label> Footer </label>
			<div class="form-group">
				<input type="text" name="footer" placeholder="Nội dung" class="form-control use-ckeditor" autocomplete="off" />
			</div>
			<label><input type="checkbox" name="set-date" value="true" /> Ngày thi </label>
			<div class="form-group">
				<input type="text" name="date" placeholder="Ngày giờ thi" class="form-control" autocomplete="off" disabled="disabled" />
			</div>
		</div>
		<div class="panel-footer">
			<button type="submit" class="btn btn-primary" name="action" value="add" title="Thêm mới"> Xác nhận </button>
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		$.validator.addMethod('datetime', function(value, element, flag){
			return flag === true ? moment(value, 'DD-MM-YYYY HH:mm:ss').isValid() : true;
		});
		$('[name="date"]').datetimepicker({
			inline: true,
			sideBySide: true,
			format: 'DD-MM-YYYY HH:mm:ss'
		});
		var header = "<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\"><tbody><tr><td style=\"text-align:center\"><strong>B\u1ED8 <u>GI\u00C1O D\u1EE4C V\u00C0 \u0110\u00C0O T<\/u>\u1EA0O<\/strong><\/td><td style=\"text-align:center\"><strong>K\u1EF2 THI TRUNG H\u1ECCC PH\u1ED4 TH\u00D4NG QU\u1ED0C GIA N\u0102M 2017<\/strong><\/td><\/tr><tr><td>&nbsp;<\/td><td style=\"text-align:center\"><strong>M\u00F4n thi : TO\u00C1N<\/strong><\/td><\/tr><tr><td style=\"text-align:center\"><strong>\u0110\u1EC0 THI MINH H\u1ECCA<\/strong><\/td><td style=\"text-align:center\"><em>Th\u1EDDi <u>gian l\u00E0m b\u00E0i: 120 ph\u00FAt, kh\u00F4ng k\u1EC3 th\u1EDDi gian ph\u00E1t<\/u> \u0111\u1EC1<\/em><\/td><\/tr><tr><td style=\"text-align:center\"><em>(\u0110\u1EC1 thi c\u00F3 01 trang)<\/em><\/td><td style=\"text-align:center\">&nbsp;<\/td><\/tr><tr><td style=\"vertical-align:top\">&nbsp;<\/td><td style=\"vertical-align:top\"><table align=\"center\" border=\"1\" cellpadding=\"10\" cellspacing=\"1\" style=\"width:150px\"><tbody><tr><td style=\"text-align:center\"><strong>M\u00E3 \u0111\u1EC1 thi 012<\/strong><\/td><\/tr><\/tbody><\/table><\/td><\/tr><\/tbody><\/table>";
		var footer = "<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\"><tbody><tr><td style=\"text-align:center\"><strong>---------------------------------------- H\u1EBET&nbsp;----------------------------------------<\/strong><\/td><\/tr><tr><td style=\"text-align:center\"><em>Th\u00ED sinh kh\u00F4ng \u0111\u01B0\u1EE3c ph\u00E9p s\u1EED d\u1EE5ng t\u00E0i li\u1EC7u<\/em><\/td><\/tr><\/tbody><\/table>\u200B\u200B\u200B\u200B\u200B";
		$('#add-exam [name="header"]').val(header);
		$('#add-exam [name="footer"]').val(footer);
		$('#add-exam [name="set-date"]').on('change', function(){
			$(this).parents('form').find('[name="date"]').prop('disabled', $(this).is(':not(:checked)'));
		});
		$('#add-exam').validate({
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
</script>
