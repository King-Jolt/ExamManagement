(function close_msg()
{
	var time = 5000;
	setTimeout(function() {
		$('.auto-close-msg').remove();
	}, time);
})();

$(document).ready(function(){
	$(this).on('click', '.btn-collapse', function(){
		$(this).siblings('.collapse').collapse('toggle');
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
