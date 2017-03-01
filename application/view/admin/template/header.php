<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="icon" href="/asset/default/icon.png" />
		<link rel="stylesheet" href="/extension/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/extension/bootstrap/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" href="/extension/owner/css/custom.css" />
		<link rel="stylesheet" href="/extension/jquery-confirm/jquery-confirm.min.css" />
		<script src="/extension/jquery/jquery-1.12.4.min.js"></script>
		<script src="/extension/jquery/jquery.validate.js"></script>
		<script src="/extension/bootstrap/js/bootstrap.min.js"></script>
		<script src="/extension/ckeditor4/ckeditor.js"></script>
		<script type="text/javascript" src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML"></script>
		<script src="/extension/jquery-confirm/jquery-confirm.min.js"></script>
		<script src="/extension/owner/js/app.js"></script>
		<script type="text/x-mathjax-config">
			/*
			MathJax.Hub.Register.StartupHook("End Jax",function () {
				var BROWSER = MathJax.Hub.Browser;
				var jax = "PreviewHTML";
				if (BROWSER.isMSIE && BROWSER.hasMathPlayer) jax = "NativeMML";
				return MathJax.Hub.setRenderer(jax);
			});
			*/
			var f = function(){};
			if (typeof(q_view) === 'function')
			{
				f = q_view;
			}
			MathJax.Hub.Queue(["Typeset",MathJax.Hub]); 
			MathJax.Hub.Queue(f);
			MathJax.Hub.Config({
				tex2jax: {inlineMath: [["$","$"],["\\(","\\)"]]},
				messageStyle: "none",
				menuSettings: {
					collapsible: false,
					autocollapse: false,
					explorer: false
				}
			});
		</script>
		<title> <?php self::put($title) ?> </title>
	</head>
	<body>
		