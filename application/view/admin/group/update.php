<script src="/extension/owner/js/group/form.js"></script>
<form class="panel panel-default" method="post" id="group">
	<div class="panel-heading">
		<span class="text-muted"> Chỉnh sửa nhóm câu hỏi </span>
	</div>
	<div class="panel-body">
		<label> Tiêu đề </label>
		<div class="form-group">
			<input type="text" class="form-control" name="title" value="{{title}}" autofocus />
		</div>
		<label><input type="checkbox" name="has-content" value="1" {{has_content}} /> Nội dung </label>
		<div class="form-group">
			<input type="text" class="form-control" name="content" value="{{content}}" />
		</div>
		<button class="btn btn-primary" name="update" value="1"> Xác nhận </button>
	</div>
</form>
