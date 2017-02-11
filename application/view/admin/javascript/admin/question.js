$(document).ready(function(){
	(function q_view(){
		var c = $('.question-preview');
		var ol = c.find('ol.multiple-choice');
		ol.each(function(){
			var li = $(this).children('li');
			var col = '';
			if (li.length ^ 1)
			{
				var n = 0;
				li.each(function(){
					var w = $(this).find('.choice').first().width();
					if (w > n)
					{
						n = w;
					}
				});
				var w = li.width();
				if (n <= (w / 4))
				{
					col = 'col-4';
				}
				else if (n <= (w / 2))
				{
					col = 'col-2';
				}
				$(this).addClass(col);
			}
		});
	})();
});
