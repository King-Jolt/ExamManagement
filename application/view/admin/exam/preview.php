<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="/extension/bootstrap/css/bootstrap.min.css">
		<script src="/extension/jquery/jquery-1.12.4.min.js"></script>
		<script src="/extension/bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="/extension/owner/css/question_preview.css">
		<script src="/extension/owner/js/exam/preview.js"></script>
		<script src="/extension/owner/js/app.js"></script>
		{{ mathjax }}
		<script type="text/x-mathjax-config">
			MathJax.Hub.Queue(layoutContent);
		</script>

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
	</head>
	<body>
		{{ content }}
		<div class="hide-print">
			<button class="btn btn-primary" onclick="window.print()"><strong><span class="glyphicon glyphicon-print"></span>&nbsp;In đề này </strong></button>
			<button class="btn btn-success" id="show-answer"><strong><span class="glyphicon glyphicon-eye-open"></span> Hiển thị đáp án </strong></button>
		</div>
	</body>
</html>