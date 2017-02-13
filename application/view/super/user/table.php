<div class="form-group">
	<a href="<?php self::put($back) ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp; Quay lại </a>
</div>
<div class="form-group">
	<button data-toggle="collapse" data-target="#add" class="btn btn-primary"> Thêm tài khoản <span class="caret"></span></button>
</div>
<div id="add" class="collapse">
	<form method="post">
		<div class="form-inline form-group">
			<input type="text" name="user" placeholder="Nhập tên tài khoản" class="form-control" />
		</div>
		<div class="form-inline form-group">
			<input type="text" name="name" placeholder="Nhập tên giáo viên" class="form-control" />
		</div>
		<button type="submit" class="btn btn-primary" name="action" value="add" title="Thêm mới"> Xác nhận </button>
	</form>
</div>
<hr />
<?php self::put($msg) ?>
<?php self::put($table) ?>
