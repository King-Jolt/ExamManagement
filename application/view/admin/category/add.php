<form class="panel panel-default" method="post" id="add">
	<div class="panel-heading">
		{{ title }}
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
		<button type="submit" class="btn btn-primary" name="action" value="{{action}}" title="Thêm mới danh mục">
			<span class="glyphicon glyphicon-check"></span> Xác nhận
		</button>
	</div>
</form>
<script>
	$(document).ready(function() {
		$('#add').validate({
			rules : {
				name : {
					required : true
				}
			},
			messages: {
				name : {
					required : 'Tên danh mục không được để trống'
				}
			},
			errorPlacement : function(error, element) {
				element.closest('.form-inline').append(error);
			},
			errorClass: 'text-danger'
		});
	}); 
</script>