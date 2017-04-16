<script src="/extension/owner/js/exam/share.js"></script>
<form class="panel panel-info" method="post">
	<div class="panel-heading">
		Tùy chọn chia sẻ
	</div>
	<div class="panel-body">
		<div class="form-group">
			<button class="btn btn-info btn-xs" type="button" id="t-tip"><span class="fa fa-question-circle"></span> Chia sẻ </button>
		</div>
		<div class="form-group form-inline">
			<div class="input-group">
				<span class="input-group-addon"><span class="fa fa-user"></span></span>
				<select class="form-control" name="object" >
					<optgroup label="Tùy chọn">
						<option value="0"> Chia sẻ tất cả </option>
						<option value="{{master}}"> Chỉ mình tôi </option>
					</optgroup>
					<optgroup label="Chọn giáo viên">
					<?php foreach ($users as $u) {
						echo "<option value=\"$u->id\"> $u->user </option>";
					} ?>
					</optgroup>
				</select>
			</div>
		</div>
		<button class="btn btn-primary" name="share" value="1" ><span class="glyphicon glyphicon-check"></span> Xác nhận </button>
	</div>
</form>