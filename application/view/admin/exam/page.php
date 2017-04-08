<link rel="stylesheet" href="/extension/datetimepicker/css/bootstrap-datetimepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<script src="/extension/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="/extension/owner/js/table.js"></script>
<?php self::put($msg) ?>
<div>
	<form class="form-group" method="post">
		<a href="{{add}}" class="btn btn-primary btn-xs"> Thêm mới </a>
		<button type="submit" class="btn btn-success btn-xs" name="action" value="view_answer" formtarget="_blank"> Xem đáp án </button>
		<button type="submit" class="btn btn-success btn-xs" name="action" value="delete"> Xóa </button>
		<hr />
		{{ table }}
	</form>
</div>