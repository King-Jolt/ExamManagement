<form id="add-link" method="post">
	<h4> <?php self::put($title) ?> </h4>
	<hr />
	<div class="form-hint"></div>
	<div class="form-group">
		<input class="form-control qt" name="q[q]" placeholder="Nhập câu hỏi vào đây" value="<?php self::put($q_content) ?>" />
	</div>
	<table class="table no-margin">
		<thead>
			<tr>
				<th>
					<div class="input-group">
						<input class="form-control" name="q[title][a]" placeholder="Tiêu đề cột A" value="<?php self::put($a_title) ?>" />
						<span class="input-group-btn"><button type="button" class="btn btn-primary pull-right add add-a" title="Thêm tùy chọn A"><span class="glyphicon glyphicon-plus"></span></button></span>
					</div>
				</th>
				<th>
					<div class="input-group">
						<input class="form-control" name="q[title][b]" placeholder="Tiêu đề cột B" value="<?php self::put($b_title) ?>" />
						<span class="input-group-btn"><button type="button" class="btn btn-primary pull-right add add-b" title="Thêm tùy chọn B"><span class="glyphicon glyphicon-plus"></span></button></span>
					</div>
				</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr class="row-input">
				<td>
					<input class="form-control qa" name="q[a][]" />
				</td>
				<td>
					<input class="form-control qb" name="q[b][]" />
				</td>
				<td>
					<button class="btn btn-primary rm-row" type="button" disabled><span class="glyphicon glyphicon-remove"></span></button>
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="10">
					<div class="form-inline">
						<input type="number" class="form-control" name="q[score]" placeholder="Điểm" value="<?php self::put($score) ?>" step="0.1" />
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="10">
					<button type="submit" class="btn btn-success" name="<?php self::put($action) ?>" value="<?php self::put($type) ?>"><span class="glyphicon glyphicon-check"></span> Xác nhận </button>
				</td>
			</tr>
		</tfoot>
	</table>
</form>
