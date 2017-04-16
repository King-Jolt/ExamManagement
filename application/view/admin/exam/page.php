<link rel="stylesheet" href="/extension/datetimepicker/css/bootstrap-datetimepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/vi.js"></script>
<script src="/extension/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="/extension/owner/js/form-table.js"></script>
{{ msg }}
<div>
	<form class="require-checkbox-from-table" method="post">
		<div class="form-group">
			<a href="{{add}}" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> Thêm mới </a>
			<button type="submit" class="btn btn-success btn-xs" name="action" value="view_answer" formtarget="_blank"><span class="fa fa-book"></span> Xem đáp án </button>
			<button type="submit" class="btn btn-warning btn-xs" name="delete" value="1"><span class="fa fa-remove"></span> Xóa </button>
		</div>
		{{ table }}
	</form>
</div>