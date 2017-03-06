(function close_msg()
{
	var time = 5000;
	setTimeout(function() {
		$('.auto-close-msg').remove();
	}, time);
})();

$(document).ready(function(){
	$('#about').on('click', function(e){
		e.preventDefault();
		$.alert({title: 'Thông tin', content: 'Phiên bản : 2016.2 <br />Design by : scila1996<br /><em>Thanh you for using !</em>', type: 'green'});
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
