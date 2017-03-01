<div class="container-fluid">
	<div class="row">
		<div class="col-xs-6">
			<form class="panel panel-info" method="post" id="chpw">
				<div class="panel-heading"><strong><span class="glyphicon glyphicon-cog"></span>&nbsp; Thay đổi mật khẩu </strong></div>
				<div class="panel-body">
					<?php self::put($msg) ?>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Mật khẩu cũ" name="o_pass" autofocus />
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Mật khẩu mới" name="n_pass" />
					</div>
					<div>
						<input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="r_pass" />
					</div>
				</div>
				<div class="panel-footer">
					<div class="text-right">
						<button type="submit" class="btn btn-primary" name="btn-action" value="change"><strong><span class="glyphicon glyphicon-log-in"></span>&nbsp; Xác nhận </strong></button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#chpw').validate({
			rules: {
				n_pass: {
					required: true,
					minlength: 8
				},
				r_pass: {
					required: true,
					equalTo: '[name="n_pass"]'
				}
			},
			messages: {
				n_pass: {
					required: 'Bạn phải nhập mật khẩu mới',
					minlength: 'Mật khẩu phải có ít nhất 8 ký tự trở lên'
				},
				r_pass: {
					required: 'Không được để trống',
					equalTo: 'Mật khẩu nhập lại không khớp'
				}
			},
			errorClass: 'text-danger'
		});
	});
</script>