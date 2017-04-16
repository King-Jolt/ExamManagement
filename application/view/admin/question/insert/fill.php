<script src="/extension/owner/js/question/form_insert/fill.js"></script>
<form id="add-fill-question" method="post">
	<h4> Thêm câu điền khuyết </h4>
	<hr />
	<div class="form-hint"></div>
	<div class="form-group">
		<textarea name="content" placeholder="data"></textarea>
		<!--
		<input class="form-control use-ckeditor" name="content" placeholder="Nhập câu hỏi vào đây" autofocus autocomplete="off" />
		-->
	</div>
	<div class="form-group">
		<div class="form-inline">
			<input type="number" class="form-control" name="score" placeholder="Điểm" step="0.1" />
		</div>
	</div>
	<button type="submit" class="btn btn-success" name="insert" value="1"> Xác nhận </button>
</form>
