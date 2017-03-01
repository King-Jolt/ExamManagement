<form method="post" id="form-select">
	<div class="form-group">
		<?php self::put($data) ?>
	</div>
	<div class="form-group form-inline">
		<div class="input-group">
			<div class="input-group-addon"> Số câu đã chọn </div>
			<input type="number" class="form-control n_selected" readonly="readonly" disabled="disabled" />
		</div>
	</div>
	<button type="submit" class="btn btn-default" name="action" value="select_random"><span class="glyphicon glyphicon-check"></span>&nbsp; Xác nhận </button>
</form>
<script>
	$(document).ready(function(){
		$('#form-select [name^="e"]').on('change', function(){
			var n = 0;
			$('#form-select [name^="e"]').each(function(){
				n += parseInt($(this).val());
			});
			$('#form-select .n_selected').val(n);
		}).trigger('change');
	});
</script>