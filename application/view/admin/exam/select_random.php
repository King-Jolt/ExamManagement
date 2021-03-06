<form method="post" id="form-select">
	<div class="form-group">
		<label>
			<input type="checkbox" id="random" name="set_random" value="1" /> Chọn ngẫu nhiên
		</label>
	</div>
	<div class="form-group">
		<?php self::put($data) ?>
	</div>
	<div class="form-group form-inline">
		<div class="input-group">
			<div class="input-group-addon"> Số câu đã chọn </div>
			<input type="number" class="form-control n_selected" readonly="readonly" disabled="disabled" />
		</div>
	</div>
	<div id="list-modal">
		
	</div>
	<button type="submit" class="btn btn-default" name="action" value="select_random"><span class="glyphicon glyphicon-check"></span>&nbsp; Xác nhận </button>
</form>
<style>
	a.select-manual[q-count]:after
	{
		content: " (Đã chọn "attr(q-count)" câu)";
		color: green;
		font-weight: bold;
	}
</style>
<script>
	$(document).ready(function(){
		$('#form-select').on('change', 'input[name^="q["]', function(){
			var n = 0;
			$('#form-select .n_selected').val($('#form-select input[name^="q["]:checked').length);
			var md_sel = $(this).closest('.modal');
			if (c = md_sel.find('input[name^="q["]:checked').length)
			{
				md_sel.siblings('.select-status').removeClass('hide');
				md_sel.siblings('.select-manual').attr('q-count', c);
			}
			else
			{
				md_sel.siblings('.select-status').addClass('hide');
				md_sel.siblings('.select-manual').removeAttr('q-count');
			}
		});
		$('#form-select [name^="exam"]').on('change', function(){
			var n = 0;
			$('#form-select [name^="exam"]').each(function(){
				v = parseInt($(this).val());
				n += v;
				if (v)
				{
					$(this).siblings('.select-status').removeClass('hide');
				}
				else
				{
					$(this).siblings('.select-status').addClass('hide');
				}
			});
			$('#form-select .n_selected').val(n);
		}).trigger('change');
		$('#random').on('change', function(){
			if ($(this).is(':checked'))
			{
				$('#form-select select[name^="exam"]').removeClass('hide').prop('disabled', false).trigger('change');
				$('#form-select .select-manual').addClass('hide');
				$('#form-select input[name^="q["]').prop('disabled', true);
			}
			else
			{
				$('#form-select select[name^="exam"]').addClass('hide').prop('disabled', true);
				$('#form-select .select-manual').removeClass('hide');
				$('#form-select input[name^="q["]').prop('disabled', false).trigger('change');
			}
		}).trigger('change');
		$('#form-select .select-manual').on('click', function(e){
			if ($(this).next('.modal').length)
			{
				$(this).next('.modal').modal();
			}
			else
			{
				var t = $(this);
				var d = $('#list-modal');
				var html = '';
				$.ajax({
					url: $(this).prop('href'),
					async: false,
					dataType: 'html',
					success: function(result){
						html = result;
					}
				});
				$(this).after(html);
				$(this).next('.modal').modal();
			}
			e.preventDefault();
		});
	});
</script>