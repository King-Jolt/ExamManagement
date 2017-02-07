$(document).ready(function(){
	$(document).on('click', '#add-link .add', function(){
		var tr = $(this).parents('table').first().find('.row-input');
		var clone = tr.first().clone();
		clone.find('input[name]').val('');
		clone.find('.rm-row').removeProp('disabled');
		if ($(this).hasClass('add-a'))
		{
			tr.has('.qa').last().after(clone);
		}
		else if ($(this).hasClass('add-b'))
		{
			clone.find('td:has(.qa)').empty();
			tr.last().after(clone);
		}
	});
	$(document).on('click', '#add-link .rm-row', function(){
		$(this).parents('.row-input').remove();
	});
});
