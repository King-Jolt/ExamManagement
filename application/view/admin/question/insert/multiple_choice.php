<form id="add-multiple-choice" method="post">
	<h4> Thêm câu chọn đáp án </h4>
	<hr />
	<div class="form-hint"></div>
	<div class="form-group">
		<input class="form-control use-ckeditor" name="content" placeholder="Nhập câu hỏi vào đây" autofocus autocomplete="off" />
	</div>
	<div class="form-group">
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
		<ol type="A" class="answer-options">
			<li>
				<div class="form-inline form-group">
					<div class="input-group" style="padding-left: 15px">
						<input type="text" class="form-control use-ckeditor" name="options[0][content]" autocomplete="off" />
						<span class="input-group-addon"><input type="checkbox" name="options[0][boolean]" value="1" /></span>
					</div>
				</div>
			</li>
		</ol>
	</div>
	<div class="form-group">
		<div class="form-inline">
			<input type="number" class="form-control" name="score" placeholder="Điểm" step="0.1" autocomplete="off" />
		</div>
	</div>
	<button type="submit" class="btn btn-success" name="insert" value="1"> Xác nhận </button>
</form>
<script src="/extension/owner/js/question/form_insert/create_multiple_choice.js"></script>