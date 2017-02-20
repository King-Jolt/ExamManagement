function q_view(){
	var c = $('.question-preview');
	var ol = c.find('ol.multiple-choice');
	var w = ol.width();
	ol.each(function(){
		var li = $(this).children('li');
		var col = '';
		if (!(li.length & 1))
		{
			var n = 0;
			li.each(function(){
				var w = $(this).find('.choice').first().width();
				if (w > n)
				{
					n = w;
				}
			});
			if (n < (w / 3))
			{
				col = 'col-2';
			}
			else if (n < (w / 5))
			{
				col = 'col-4';
			}
			$(this).addClass(col);
		}
	});
};

var obj_q = new (function(){
	this.qa_show = function() {
		$('.question-preview .multiple-choice .choice[answer="1"]').css({'color': 'red', 'font-weight': 'bold'});
		$('.question-preview .link-table [answer]').each(function(){
			$(this).html('<span style="color: red; font-weight: bold">' + $(this).attr('answer') + '</span>');
		});
	};
	this.qa_hide = function() {
		$('.question-preview .multiple-choice .choice[answer="1"]').css({'color': '', 'font-weight': ''});
		$('.question-preview .link-table [answer]').each(function(){
			$(this).html('.....');
		});
	};
})();

obj_q.qa_hide();

$('#view-answer').click(function(){
	var clk = $(this).attr('data-click');
	if (clk == 'show')
	{
		$(this).attr('data-click', 'hide');
		obj_q.qa_show();
	}
	else if (clk == 'hide')
	{
		$(this).attr('data-click', 'show');
		obj_q.qa_hide();
	}
});
