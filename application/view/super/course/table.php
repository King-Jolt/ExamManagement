<?php self::put($msg) ?>
<form method="post">
	<div class="form-inline form-group">
		<div class="input-group">
			<input type="text" name="name" placeholder="Nhập tên bộ môn" class="form-control" />
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary" name="action" value="add" title="Thêm mới"> Thêm mới </button>
			</span>
		</div>
	</div>
</form>
<?php self::put($table) ?>
