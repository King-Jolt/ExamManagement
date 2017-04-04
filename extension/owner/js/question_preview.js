function q_view(){
	$('.exam-wrap .question-preview .multiple-choice .list-option').each(function(){
		var w = $(this).width();
		var max = 0;
		var opt = $(this).find('.option');
		var s = 20;
		var col = 'col-10';
		if (!(opt.length & 1))
		{
			opt.each(function(){
				var n = $(this).width();
				if (n > max) max = n;
			});
			if ((max + s) < (w / 4) && opt.length > 2) col = 'col-4';
			else if ((max + s) < (w / 2)) col = 'col-2';
		}
		$(this).addClass(col);
	});
};

var obj_q = new (function(){
	this.toggle = function(){
		if ($('.exam-wrap').hasClass('show-answer'))
		{
			this.hide();
		}
		else
		{
			this.show();
		}
		return this;
	};
	this.show = function() {
		$('.exam-wrap').addClass('show-answer');
		$('.question-preview [data-fill]').each(function(){
			$(this).html('"' + $(this).attr('data-fill') + '"');
		});
		MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
		return this;
	};
	this.hide = function() {
		$('.exam-wrap').removeClass('show-answer');
		$('.question-preview [data-fill]').each(function(){
			$(this).text($(this).attr('data-fill').replace(/.?/g, '..'));
		});
		MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
		return this;
	};
	this.show_TableAnswer = function() {
		$('.exam-wrap .question-preview').addClass('hide');
		$('.exam-wrap .table-answer').removeClass('hide');
	};
	this.hide_TableAnswer = function() {
		$('.exam-wrap .question-preview').removeClass('hide');
		$('.exam-wrap .table-answer').addClass('hide');
	};
	this.hide();
})();

