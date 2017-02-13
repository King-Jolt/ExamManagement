<?php self::put($msg) ?>
<form method="post">
	<div class="form-inline form-group">
		<div class="input-group">
			<input type="text" name="title" placeholder="Nhập tên đề thi" class="form-control" />
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary" name="action" value="add" title="Thêm mới"> Thêm đề thi </button>
			</span>
		</div>
	</div>
</form>
<?php self::put($table) ?>
