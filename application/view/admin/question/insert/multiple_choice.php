<script src="/extension/owner/js/question/form_insert/multiple_choice.js"></script>
<style>
	.answer-options
	{
		counter-reset: section;
	}
	.answer-options .option label:before
	{
		counter-increment: section;
		content: "Đáp án " counter(section, upper-alpha) " : ";
		font-weight: normal;
	}
</style>
<form id="add-multiple-choice" method="post">
	<h4> Thêm câu chọn đáp án </h4>
	<hr />
	<div class="form-group">
		<p><label><span class="fa fa-pencil"></span> Nhập câu hỏi vào ô này: </label></p>
		<textarea name="content" contenteditable="true"></textarea>
	</div>
	<div class="form-group">
		<p><label><span class="fa fa-check-square-o"></span> Tích chọn những đáp án đúng: </label></p>
		<div class="form-inline">
			<div class="input-group">
				<span class="input-group-addon"> Số đáp án </span>
				<select class="form-control set-answer-number">
					<option value="2"> 2 </option>
					<option value="3"> 3 </option>
					<option value="4"> 4 </option>
					<option value="5"> 5 </option>
				</select>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="answer-options">
			<div class="option form-group">
				<label><input type="checkbox" name="options[0][boolean]" value="1" /></label>
				<textarea name="options[0][content]"></textarea>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="form-inline">
			<input type="number" class="form-control" name="score" placeholder="Điểm" step="0.1" autocomplete="off" />
		</div>
	</div>
	<button type="submit" class="btn btn-primary" name="insert" value="1"><span class="fa fa-check"></span> Xác nhận </button>
</form>
