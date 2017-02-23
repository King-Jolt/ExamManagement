<?php self::put($msg) ?>
<div class="container-fixed">
	<div class="form-group">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-exam"> Thêm mới &nbsp;<span class="caret"></span></button>
		<form method="post" class="modal fade" id="add-exam" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"> Nhập thông tin cho đề thi </h4>
					</div>
					<div class="modal-body">
						<div class="form-hint"></div>
						<label> Tên đề thi </label>
						<div class="form-group">
							<input type="text" name="title" placeholder="Nhập tên đề thi" class="form-control" autocomplete="off" />
						</div>
						<label> Header </label>
						<div class="form-group">
							<input type="text" name="header" placeholder="Nội dung" class="form-control use-ckeditor" autocomplete="off" />
						</div>
						<label> Footer </label>
						<div class="form-group">
							<input type="text" name="footer" placeholder="Nội dung" class="form-control use-ckeditor" autocomplete="off" />
						</div>
						<label> Ngày thi </label>
						<div class="form-group">
							<input type="datetime-local" name="date" placeholder="Ngày giờ thi" class="form-control" autocomplete="off" />
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-default" name="action" value="add" title="Thêm mới"> Xác nhận </button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	$(document).ready(function(){
		var header = "<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\"><tbody><tr><td style=\"text-align:center\"><strong>B\u1ED8 <u>GI\u00C1O D\u1EE4C V\u00C0 \u0110\u00C0O T<\/u>\u1EA0O<\/strong><\/td><td>&nbsp;<\/td><td style=\"text-align:center\"><strong>K\u1EF2 THI TRUNG H\u1ECCC PH\u1ED4 TH\u00D4NG QU\u1ED0C GIA N\u0102M 2017<\/strong><\/td><\/tr><tr><td>&nbsp;<\/td><td>&nbsp;<\/td><td style=\"text-align:center\"><strong>M\u00F4n thi : TO\u00C1N<\/strong><\/td><\/tr><tr><td style=\"text-align:center\"><strong>\u0110\u1EC0 THI MINH H\u1ECCA<\/strong><\/td><td>&nbsp;<\/td><td style=\"text-align:center\"><em>Th\u1EDDi <u>gian l\u00E0m b\u00E0i: 120 ph\u00FAt, kh\u00F4ng k\u1EC3 th\u1EDDi gian ph\u00E1t<\/u> \u0111\u1EC1<\/em><\/td><\/tr><tr><td style=\"text-align:center\"><em>(\u0110\u1EC1 thi c\u00F3 01 trang)<\/em><\/td><td>&nbsp;<\/td><td>&nbsp;<\/td><\/tr><\/tbody><\/table>";
		var footer = "<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\"><tbody><tr><td style=\"text-align:center\"><strong>---------------------------------------- H\u1EBET&nbsp;----------------------------------------<\/strong><\/td><\/tr><tr><td style=\"text-align:center\"><em>Th\u00ED sinh kh\u00F4ng \u0111\u01B0\u1EE3c ph\u00E9p s\u1EED d\u1EE5ng t\u00E0i li\u1EC7u<\/em><\/td><\/tr><\/tbody><\/table>\u200B\u200B\u200B\u200B\u200B";
		$('#add-exam [name="header"]').val(header);
		$('#add-exam [name="footer"]').val(footer);
		$('#add-exam').on('shown.bs.modal', function(){
			$(this).find('input[type="text"]').first().focus();
		}).validate({
			rules: {
				title: {
					required: true
				}
			},
			messages: {
				title: {
					required: 'Bạn phải nhập tên đề thi'
				}
			},
			errorClass: 'text-danger'
		});
	});
</script>
<?php self::put($table) ?>
