(function close_msg()
{
	var time = 5000;
	setTimeout(function() {
		$('.auto-close-msg').remove();
	}, time);
})();

$(document).ready(function(){
	$(document).on('scroll', function(){
		var nav = $('#main-navbar nav');
		var side = $('#main-sidebar');
		if ($(this).scrollTop() >= nav.height())
		{
			nav.css({'display' : 'none'});
			side.css({'top': '0px'});
		}
		else
		{
			nav.css({'display' : ''});
			side.css({'top' : ''});
		}
	});
	$('[data-toggle="popover"]').popover({
		trigger: 'hover'
	});
	$('.dropdown').on('show.bs.dropdown', function() {
		$(this).find('.dropdown-menu').first().stop(true, true).slideDown(200);
	});
	$('.dropdown').on('hide.bs.dropdown', function() {
		$(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
	});
	$('body').tooltip({
		selector: 'button[title], a[title]',
		container: 'body'
	});
	$('body').on('focus', 'button, a', function(){
		$(this).blur();
	});
	$('.be-care').confirm({
		title: 'Xác nhận',
		content: 'Bạn có chắc chắn muốn xóa ?',
		type: 'red'
	});
});
