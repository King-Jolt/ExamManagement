<style>
	body
	{
		width: 210mm;
		/* min-height: 297mm;*/
		height: auto;
		/*border: 1px solid #C0C0C0;*/
		margin: auto;
		padding-top: 0px;
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
		body
		{
			border: none;
		}
	}
	@page
	{
		size: A5;
		margin: 0.5cm;
	}
</style>
<div class="hide-print">
	<button class="btn btn-primary" onclick="window.print()"><strong><span class="glyphicon glyphicon-print"></span>&nbsp;In đề này </strong></button>
</div>
<?php self::put($content) ?>
<script src="/extension/owner/js/question.js"></script>
<link rel="stylesheet" href="/extension/owner/css/question.css" />
