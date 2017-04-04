<link rel="stylesheet" href="/extension/owner/css/form_table.css" />
<form class="panel panel-default" method="post">
	<div class="panel-heading"> Sao chép đề thi </div>
	<div class="panel-body">
		<table class="form-table">
			<tr>
				<td> Nhập số đề cần sao chép </td>
				<td><input type="number" class="form-control" name="quantity" value="1" /></td>
			</tr>
			<tr>
				<td> Tự động xáo trộn </td>
				<td>
					<label><input type="radio" name="shuffle" checked="checked" value="1" /> Yes</label> &nbsp;
					<label><input type="radio" name="shuffle" value="0" /> No</label>
				</td>
			</tr>
		</table>
		<button type="submit" class="btn btn-primary" name="action" value="copy"> Xác nhận </button>
	</div>
</form>