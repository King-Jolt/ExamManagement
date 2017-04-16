<link rel="stylesheet" href="/extension/datetimepicker/css/bootstrap-datetimepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script src="/extension/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="/extension/owner/js/exam/form.js"></script>

<form method="post" class="panel panel-default" id="exam-form">
	<div class="panel-heading">
		<span class="text-muted"> Nhập thông tin chỉnh sửa </span>
	</div>
	<div class="panel-body">
		<div class="form-hint"></div>
		<label> Tên đề thi </label>
		<div class="form-group">
			<input type="text" name="title" placeholder="Nhập tên đề thi" class="form-control" autocomplete="off" autofocus value="{{title}}" />
		</div>
		<label> Header </label>
		<div class="form-group">
			<textarea name="header">{{header}}</textarea>
		</div>
		<label> Footer </label>
		<div class="form-group">
			<textarea name="footer">{{footer}}</textarea>
		</div>
		<label><input type="checkbox" name="set-date" value="true" {{set_checked}} /> Ngày thi </label>
		<div class="form-group">
			<input type="text" name="date" placeholder="Ngày giờ thi" class="form-control" autocomplete="off" disabled="disabled" />
		</div>
	</div>
	<div class="panel-footer">
		<button type="submit" class="btn btn-success" name="update" value="1" title="Thêm mới"><span class="fa fa-check-square-o"></span> Cập nhật </button>
	</div>
</form>
