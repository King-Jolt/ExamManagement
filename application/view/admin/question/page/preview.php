<?php self::put($data) ?>
<link rel="stylesheet" href="/extension/owner/css/question_preview.css" />
<script src="/extension/owner/js/question_preview.js"></script>
<script type="text/x-mathjax-config">
	var f = function(){};
	if (typeof(q_view) === 'function')
	{
		f = q_view;
	}
	MathJax.Hub.Queue(["Typeset",MathJax.Hub]); 
	MathJax.Hub.Queue(f);
</script>
<?php self::put($script) ?>
