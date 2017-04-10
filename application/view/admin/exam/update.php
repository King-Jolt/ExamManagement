<link rel="stylesheet" href="/extension/datetimepicker/css/bootstrap-datetimepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script src="/extension/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="/extension/owner/js/exam/form_validate.js"></script>
<div>
	<form method="post" class="exam-form panel panel-default" role="dialog">
		<div class="panel-heading">
			<span class="text-muted"> Nhập thông tin chỉnh sửa </span>
		</div>
		<div class="panel-body">
			<div class="form-hint"></div>
			<label> Tên đề thi </label>
			<div class="form-group">
				<input type="text" name="title" placeholder="Nhập tên đề thi" class="form-control" autocomplete="off" value="{{title}}" autofocus />
			</div>
			<label> Header </label>
			<div class="form-group">
				<input type="text" name="header" placeholder="Nội dung" class="form-control use-ckeditor" autocomplete="off" />
			</div>
			<label> Footer </label>
			<div class="form-group">
				<input type="text" name="footer" placeholder="Nội dung" class="form-control use-ckeditor" autocomplete="off" />
			</div>
			<label><input type="checkbox" name="set-date" value="true" {{set_checked}} /> Ngày thi </label>
			<div class="form-group">
				<input type="text" name="date" placeholder="Ngày giờ thi" class="form-control" value="{{date}}" autocomplete="off" disabled="disabled" />
			</div>
		</div>
		<div class="panel-footer">
			<button type="submit" class="btn btn-primary" name="update" value="1" title="Xác nhận thay đổi"> Xác nhận </button>
		</div>
	</form>
</div>
<div id="template-header" class="hidden">{{header}}</div>
<div id="template-footer" class="hidden">{{footer}}</div>
