<div class="form-group">
	<a href="<?php self::put($back) ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp; Quay lại </a>
</div>
<div class="form-group">
	<button data-toggle="collapse" data-target="#add" class="btn btn-primary"> Thêm tài khoản <span class="caret"></span></button>
</div>
<div id="add" class="collapse">
	<form method="post">
		<div class="form-inline form-group">
			<label>
				<p> Tên tài khoản </p>
				<input type="text" name="user" placeholder="Nhập tên tài khoản" class="form-control" />
			</label>
		</div>
		<div class="form-inline form-group">
			<label>
				<p> Họ tên đầy đủ của giáo viên </p>
				<input type="text" name="name" placeholder="Nhập tên giáo viên" class="form-control" />
			</label>
		</div>
		<button type="submit" class="btn btn-primary" name="action" value="add"><span class="glyphicon glyphicon-ok"></span>&nbsp; Xác nhận </button>
	</form>
</div>
<hr />
<?php self::put($msg) ?>
<?php self::put($table) ?>
<script>
	$('#add').on('shown.bs.collapse', function(){
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
	$('#add form').validate({
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