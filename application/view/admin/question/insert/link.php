<script src="/extension/owner/js/question/form_insert/link.js"></script>
<form id="add-link" method="post">
	<h4> Thêm câu hỏi ghép nối </h4>
	<hr />
	<div class="form-hint"></div>
	<div class="form-group">
		<input class="form-control use-ckeditor" name="content" placeholder="Nhập câu hỏi vào đây" autofocus autocomplete="off" />
	</div>
	<table class="table table-striped no-margin">
		<thead>
			<tr>
				<th>
					<div class="form-group">
						<input class="form-control" name="a_title" placeholder="Tiêu đề cột A" autocomplete="off" />
					</div>
					<button type="button" class="btn btn-primary btn-xs add add-a" title="Thêm tùy chọn A"> Thêm tùy chọn </button>
				</th>
				<th>
					<div class="form-group">
						<input class="form-control" name="b_title" placeholder="Tiêu đề cột B" autocomplete="off" />
					</div>
					<button type="button" class="btn btn-info btn-xs add add-b" title="Thêm tùy chọn B"> Thêm tùy chọn </button>
				</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr class="row-input">
				<td>
					<input class="form-control qa use-ckeditor" name="option[0][a]" autocomplete="off" />
				</td>
				<td>
					<input class="form-control qb use-ckeditor" name="option[0][b]" autocomplete="off" />
				</td>
				<td>
					<button class="btn btn-primary rm-row" type="button" disabled><span class="glyphicon glyphicon-trash"></span></button>
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="10">
					<div class="form-inline">
						<input type="number" class="form-control" name="score" placeholder="Điểm" step="0.1" autocomplete="off" />
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="10">
					<button type="submit" class="btn btn-success" name="insert" value="1"><span class="glyphicon glyphicon-check"></span> Xác nhận </button>
				</td>
			</tr>
		</tfoot>
	</table>
</form>
