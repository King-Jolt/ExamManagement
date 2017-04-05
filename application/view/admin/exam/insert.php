<link rel="stylesheet" href="/extension/datetimepicker/css/bootstrap-datetimepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script src="/extension/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="/extension/owner/js/exam/form_validate.js"></script>
<form method="post" class="exam-form panel panel-default" role="dialog">
	<div class="panel-heading">
		Nhập thông tin cho đề thi
	</div>
	<div class="panel-body">
		<div class="form-hint"></div>
		<label> Tên đề thi </label>
		<div class="form-group">
			<input type="text" name="title" placeholder="Nhập tên đề thi" class="form-control" autocomplete="off" autofocus />
		</div>
		<label> Header </label>
		<div class="form-group">
			<input name="header" placeholder="Nội dung" class="form-control use-ckeditor" autocomplete="off">
		</div>
		<label> Footer </label>
		<div class="form-group">
			<input type="text" name="footer" placeholder="Nội dung" class="form-control use-ckeditor" autocomplete="off" />
		</div>
		<label><input type="checkbox" name="set-date" value="true" /> Ngày thi </label>
		<div class="form-group">
			<input type="text" name="date" placeholder="Ngày giờ thi" class="form-control" autocomplete="off" disabled="disabled" />
		</div>
	</div>
	<div class="panel-footer">
		<button type="submit" class="btn btn-primary" name="action" value="insert" title="Thêm mới"> Xác nhận </button>
	</div>
</form>
<div id="template-header" class="hidden"><table align="center" border="0" cellpadding="1" cellspacing="1" style="width:100%"><tbody><tr><td style="text-align:center"><strong>BỘ <u>GIÁO DỤC VÀ ĐÀO T</u>ẠO</strong></td><td style="text-align:center"><strong>KỲ THI TRUNG HỌC PHỔ THÔNG QUỐC GIA NĂM 2017</strong></td></tr><tr><td>&nbsp;</td><td style="text-align:center"><strong>Môn thi : TOÁN</strong></td></tr><tr><td style="text-align:center"><strong>ĐỀ THI MINH HỌA</strong></td><td style="text-align:center"><em>Thời <u>gian làm bài: 120 phút, không kể thời gian phát</u> đề</em></td></tr><tr><td style="text-align:center"><em>(Đề thi có 01 trang)</em></td><td style="text-align:center">&nbsp;</td></tr><tr><td style="vertical-align:top">&nbsp;</td><td style="vertical-align:top"><table align="center" border="1" cellpadding="10" cellspacing="1" style="width:150px"><tbody><tr><td style="text-align:center"><strong>Mã đề thi 012</strong></td></tr></tbody></table></td></tr></tbody></table></div>
<div id="template-footer" class="hidden"><table align="center" border="0" cellpadding="1" cellspacing="1" style="width:100%"><tbody><tr><td style="text-align:center"><strong>---------------------------------------- HẾT&nbsp;----------------------------------------</strong></td></tr><tr><td style="text-align:center"><em>Thí sinh không được phép sử dụng tài liệu</em></td></tr></tbody></table>​​​​​</div>
