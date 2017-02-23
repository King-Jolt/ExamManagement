<form id="add-multiple-choice" method="post">
	<h4> <?php self::put($title) ?> </h4>
	<hr />
	<div class="form-hint"></div>
	<div class="form-group">
		<input class="form-control qt use-ckeditor" name="q[q]" placeholder="Nhập câu hỏi vào đây" value="<?php self::put($q_content) ?>" autocomplete="off" />
	</div>
	<div class="form-group">
		<div class="form-inline">
			<div class="input-group">
				<span class="input-group-addon"> Số đáp án </span>
				<select class="form-control set-option">
					<?php foreach (range(2, 10) as $i => $v) echo "<option value=\"$v\"> $v </option>" ?>
				</select>
			</div>
		</div>
	</div>
	<div class="form-group">
		<ol type="A">
			<li>
				<div class="form-inline form-group">
					<input class="form-control qa use-ckeditor" name="q[content][]" autocomplete="off" />
					<select name="q[bool][]" class="form-control"><option value="1"> True </option><option value="0" selected="selected"> False </option></select>
				</div>
			</li>
			<li>
				<div class="form-inline form-group">
					<input class="form-control qa use-ckeditor" name="q[content][]" autocomplete="off" />
					<select name="q[bool][]" class="form-control"><option value="1"> True </option><option value="0" selected="selected"> False </option></select>
				</div>
			</li>
		</ol>
	</div>
	<div class="form-group">
		<div class="form-inline">
			<input type="number" class="form-control" name="q[score]" placeholder="Điểm" value="<?php self::put($score) ?>" step="0.1" autocomplete="off" />
		</div>
	</div>
	<button type="submit" class="btn btn-success" name="<?php self::put($action) ?>" value="<?php self::put($type) ?>"> Xác nhận </button>
</form>
<script>
	$(document).ready(function(){
		$('form#add-multiple-choice').on('change', '.set-option', function(){
			var v = $(this).val();
			var list = $(this).parents('form').first().find('ol');
			var item = list.find('li');
			if (v > item.length)
			{
				for (var i = item.length; i < v; i++)
				{
					var new_item = item.first().clone();
					new_item.find('input[name]').val('');
					new_item.find('select[name]').val('0');
					list.append(new_item);
					new_item.find('select[name]').trigger('change');
					//$(this).parents('form').first().find('select[name]').trigger('change');
				}
			}
			else if (v < item.length)
			{
				item.slice(v - item.length).remove();
			}
		}).submit(function(){
			var a = $(this).find('[name="q[bool][]"]');
			var b = 0;
			var r = false;
			a.each(function(index){
				if (parseInt($(this).val())) b += 1;
			});
			if (!b)
			{
				$.alert({
					title: 'Thông báo',
					content: 'Phải chọn ít nhất một đáp án đúng !',
					type: 'blue'
				});
			}
			else if (b == a.length)
			{
				$.alert({
					title: 'Thông báo',
					content: 'Phải có ít nhất một phương án loại trừ !',
					type: 'blue'
				});
			}
			else
			{
				r = true;
			}
			return r;
		}).on('change', 'select[name]', function(){
			if (parseInt($(this).val()))
			{
				var IconSelected = $(document.createElement('span')).addClass('text-success glyphicon glyphicon-ok a-selected').css({'margin-left': '8px'});
				$(this).after(IconSelected);
			}
			else
			{
				$(this).next('.a-selected').remove();
			}
		});
	});
</script>