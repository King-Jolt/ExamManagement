<script src="/extension/owner/js/group/form.js"></script>
<form class="panel panel-default" method="post" id="group">
	<div class="panel-heading">
		<span class="text-muted"> Thêm nhóm câu hỏi mới </span>
	</div>
	<div class="panel-body">
		<label> Tiêu đề </label>
		<div class="form-group">
			<input type="text" class="form-control" name="title" autofocus />
		</div>
		<label><input type="checkbox" name="has-content" value="1" /> Nội dung </label>
		<div class="form-group">
			<input type="text" class="form-control" name="content" />
		</div>
		<button class="btn btn-primary" name="insert" value="1"> Xác nhận </button>
	</div>
</form>
