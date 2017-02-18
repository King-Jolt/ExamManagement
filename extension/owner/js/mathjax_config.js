MathJax.Hub.Register.StartupHook("End Jax",function () {
	var BROWSER = MathJax.Hub.Browser;
	var jax = "PreviewHTML";
	if (BROWSER.isMSIE && BROWSER.hasMathPlayer) jax = "NativeMML";
	return MathJax.Hub.setRenderer(jax);
});
MathJax.Hub.Queue(["Typeset",MathJax.Hub]); 
MathJax.Hub.Queue(q_view);
MathJax.Hub.Config({
	tex2jax: {inlineMath: [["$","$"],["\\(","\\)"]]},
	messageStyle: "none",
	menuSettings: {
		collapsible: false,
		autocollapse: false,
		explorer: false
	}
});