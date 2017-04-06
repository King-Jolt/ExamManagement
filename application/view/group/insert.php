<form class="panel panel-default" method="post" id="insert-group">
	<div class="panel-heading">
		Thêm nhóm câu hỏi mới
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
		<button class="btn btn-primary" name="action" value="insert"> Xác nhận </button>
	</div>
</form>
<script>
	$(document).ready(function(){
		$('#insert-group [name="has-content"]').on('change', function(){
			$(this).closest('form').find('[name="content"]').prop('disabled', !$(this).prop('checked'));
		}).trigger('change');
	});
</script>