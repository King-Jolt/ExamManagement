$(document).ready(function(){
	$('form#add-fill-question').validate({
		rules: {
			content: {
				required: true
			}
		},
		errorClass: 'text-danger'
	});
	$('form#add-fill-question').on('submit', function(){
		var q = $(this).find('[name="content"]');
		var html = $(document.createElement('div')).html(q.val());
		html.html(html.html().replace(/(\[)([^\[\]]+)(\])/igm, '<span class="data-fill"> $2 </span>'));
		html.find('span.data-fill').each(function(){
			$(this).attr('data-fill', $(this).html()).removeAttr('class').text('?');
		});
		q.val(html.html());
	});
});
