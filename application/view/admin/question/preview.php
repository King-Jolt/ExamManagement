<style>
	body
	{
		width: 210mm;
		/* min-height: 297mm;*/
		height: auto;
		box-shadow: 0px 0px 5px #C0C0C0;
		margin: 0.2cm auto 0.2cm auto;
		padding-right: 0.5cm;
	}
	.hide-print
	{
		position: fixed;
		top: 25px;
		right: 25px;
	}
	@media print
	{
		.hide-print
		{
			display: none !important;
		}
	}
	@page
	{
		size: A5;
		margin: 0.2cm 0 0 0;
	}
</style>
<div class="hide-print">
	<div class="form-group">
		<button class="btn btn-primary" onclick="window.print()"><strong><span class="glyphicon glyphicon-print"></span>&nbsp;In đề này </strong></button>
	</div>
	<div class="form-group">
		<!--
		<button class="btn btn-success" data-toggle="modal" data-target="#modal-setting"><strong><span class="glyphicon glyphicon-cog"></span>&nbsp;Tùy chọn </strong></button>
		-->
		<button class="btn btn-success btn-xs" onclick="obj_q.toggle()"><strong><span class="glyphicon glyphicon-check"></span>&nbsp;Xem đáp án </strong></button>
	</div>
</div>
<div class="modal fade" role="dialog" id="modal-setting">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"> Tùy chọn hiển thị </h4>
			</div>
			<div class="modal-body">
				<div class="panel panel-default">
					<div class="panel-heading"> Xem đáp án </div>
					<div class="panel-body">
						<input type="checkbox" name="show_answer_visual" /> Hiển thị trực quan <br />
						<input type="checkbox" name="show_answer_table" /> Hiển thị bảng đáp án
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"> Lưu </button>
			</div>
		</div>
	</div>
</div>
<?php self::put($content) ?>
<script>
	$(document).ready(function(){
		$('#modal-setting').on('hide.bs.modal', function(){
			if ($(this).find('[name="show_answer_visual"]').is(':checked'))
			{
				obj_q.show();
			}
			else
			{
				obj_q.hide();
			}
			if ($(this).find('[name="show_answer_table"]').is(':checked'))
			{
				obj_q.show_TableAnswer();
			}
			else
			{
				obj_q.hide_TableAnswer();
			}
		});
	});
</script>
