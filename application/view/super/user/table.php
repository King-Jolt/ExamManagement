<div class="form-group">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"> Thêm tài khoản </button>
</div>
<form id="add" class="modal fade" method="post">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"> Nhập dữ liệu </h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<div class="form-inline">
						<label>
							<p> Tên tài khoản </p>
							<input type="text" name="user" placeholder="Nhập tên tài khoản" class="form-control" />
						</label>
					</div>
				</div>
				<div class="form-group">
					<div class="form-inline">
						<label>
							<p> Họ tên đầy đủ của giáo viên </p>
							<input type="text" name="name" placeholder="Nhập tên giáo viên" class="form-control" />
						</label>
					</div>
				</div>
				<em> Mật khẩu mặc định là : "12345678", giáo viên đăng nhập theo tên tài khoản và mật khẩu này, sau đó tự đổi mật khẩu tài khoản </em>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-default" name="action" value="add"><span class="glyphicon glyphicon-ok"></span>&nbsp; Xác nhận </button>
			</div>
		</div>
	</div>
</form>
<?php self::put($msg) ?>
<?php self::put($table) ?>
<script>
	$('#add').on('shown.bs.modal', function(){
		$(this).find('input').first().focus();
	});
	$.validator.addMethod(
		"regex",
		function(value, element, regexp) {
			var re = new RegExp(regexp);
			return this.optional(element) || re.test(value);
		},
		"Please check your input."
	);
	$('#add').validate({
		rules: {
			user: {
				required: true,
				minlength: 4
			},
			name: {
				required: true
			}
		},
		errorClass: 'text-danger'
	});
</script>