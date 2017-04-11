<script src="/extension/owner/js/question/form_insert/essay.js"></script>
<form id="add-essay-question" method="post">
	<h4> Thêm câu hỏi tự luận </h4>
	<hr />
	<div class="form-hint"></div>
	<div class="form-group">
		<input class="form-control qt use-ckeditor" name="content" placeholder="Nhập câu hỏi vào đây" autofocus autocomplete="off" />
	</div>
	<div class="form-group">
		<div class="form-inline">
			<input type="number" class="form-control" name="score" placeholder="Điểm" step="0.1" />
		</div>
	</div>
	<button type="submit" class="btn btn-success" name="insert" value="1"> Xác nhận </button>
</form>
