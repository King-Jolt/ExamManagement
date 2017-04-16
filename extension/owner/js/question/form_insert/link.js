$(document).ready(function () {
	$('#add-link').validate({
		ignore: 'textarea',
		rules: {
			a_title: {
				required: true
			},
			b_title: {
				required: true
			}
		},
		errorClass: 'text-danger'
	});
	CKEDITOR.replace('content', { height: 100, startupFocus: true });
	var frow = $('#add-link table .row-input').first().clone();
	$(document).on('click', '#add-link .add', function () {
		var tr = $(this).closest('table').find('.row-input');
		var clone = frow.clone();
		clone.find('.rm-row').removeProp('disabled');
		if ($(this).hasClass('add-a'))
		{
			tr.has('.qa').last().after(clone);
		} else if ($(this).hasClass('add-b'))
		{
			clone.find('td:has(.qa)').empty(); // remove option a
			tr.last().after(clone);
		}
		$(this).closest('table').find('.row-input').each(function(index){
			$(this).find('textarea[name]').each(function(){
				$(this).prop('name', $(this).prop('name').replace(/\[(\d)\]/, '[' + index + ']'));
			});
		});
	});
	$(document).on('click', '#add-link .rm-row', function () {
		$(this).parents('.row-input').remove();
	});
});
