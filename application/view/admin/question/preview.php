<style>
	body
	{
		width: 210mm;
		/* min-height: 297mm;*/
		height: auto;
		box-shadow: 0px 0px 5px #C0C0C0;
		margin: auto;
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
		<button class="btn btn-success" onclick="obj_q.toggle()"><strong><span class="glyphicon glyphicon-check"></span>&nbsp;Xem đáp án </strong></button>
	</div>
</div>
<?php self::put($content) ?>