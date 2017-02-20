<?php self::put($msg) ?>
<div class="container-fixed">
	<div class="form-group">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-exam"> Thêm mới &nbsp;<span class="caret"></span></button>
		<form method="post" class="modal fade" id="add-exam" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"> Nhập thông tin cho đề thi </h4>
					</div>
					<div class="modal-body">
						<label> Tên đề thi </label>
						<div class="form-group">
							<input type="text" name="title" placeholder="Nhập tên đề thi" class="form-control" />
						</div>
						<label> Ngày thi </label>
						<div class="form-group">
							<input type="datetime-local" name="date" placeholder="Ngày giờ thi" class="form-control" />
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-default" name="action" value="add" title="Thêm mới"> Xác nhận </button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#add-exam').on('shown.bs.modal', function(){
			$(this).find('input[type="text"]').first().focus();
		}).validate({
			rules: {
				title: {
					required: true
				}
			},
			messages: {
				title: {
					required: 'Bạn phải nhập tên đề thi'
				}
			},
			errorClass: 'text-danger'
		});
	});
</script>
<?php self::put($table) ?>
