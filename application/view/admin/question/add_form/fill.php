<form id="add-multiple-choice" method="post">
	<h4> <?php self::put($title) ?> </h4>
	<hr />
	<div class="form-hint"></div>
	<div class="form-group">
		<input class="form-control qt use-ckeditor" name="q[q]" placeholder="Nhập câu hỏi vào đây" value="<?php self::put($q_content) ?>" autocomplete="off" />
	</div>
	<div class="form-group">
		<div class="form-inline">
			<input type="number" class="form-control" name="q[score]" placeholder="Điểm" value="<?php self::put($score) ?>" step="0.1" />
		</div>
	</div>
	<button type="submit" class="btn btn-success" name="<?php self::put($action) ?>" value="<?php self::put($type) ?>"> Xác nhận </button>
</form>
