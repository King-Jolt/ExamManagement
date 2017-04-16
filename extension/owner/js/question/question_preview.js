function layoutContent() {
	$('.exam-preview .exam-body .multiple-choice .select').each(function () {
		var w = $(this).width();
		var max = 0;
		var opt = $(this).find('.option');
		var s = 20;
		var col = 'col-1';
		if (!(opt.length & 1))
		{
			opt.each(function () {
				var n = $(this).width();
				if (n > max)
					max = n;
			});
			if ((max + s) < (w / 4) && opt.length > 2)
				col = 'col-4';
			else if ((max + s) < (w / 2))
				col = 'col-2';
		}
		$(this).addClass(col);
	});
	$('.exam-preview .exam-body .fill [data-fill]').each(function () {
		var e = $(this).html().replace(/.?/g, '..');
		$(this).before('<span ellipsis>' + e + '</span>');
	});
}
;

$(document).ready(function () {
	$('button#show-answer').on('click', function () {
		$(this).toggleClass('btn-danger');
		$(this).find('.glyphicon').toggleClass('glyphicon-eye-close');
		$('.exam-preview').toggleClass('show-answer');
	});
});
