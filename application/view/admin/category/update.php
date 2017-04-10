<script src="/extension/owner/js/category/form_validate.js"></script>
<form class="panel panel-default category-form" method="post">
	<div class="panel-heading">
		<span class="text-muted"> Cập nhật danh mục </span>
	</div>
	<div class="panel-body">
		<div class="form-inline">
			<div class="input-group">
				<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
				<input type="text" name="name" placeholder="Nhập tên danh mục" class="form-control" value="{{value}}" autofocus />
			</div>
		</div>
	</div>
	<div class="panel-footer">
		<button type="submit" class="btn btn-primary" name="update" value="1" title="Cập nhật danh mục">
			<span class="glyphicon glyphicon-check"></span> Xác nhận
		</button>
	</div>
</form>
