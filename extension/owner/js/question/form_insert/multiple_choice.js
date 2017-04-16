$(document).ready(function () {
	var form = $('form#add-multiple-choice');
	var option = form.find('.answer-options .option').first().clone();
		
	CKEDITOR.inline('content');
	CKEDITOR.inline(form.find('.answer-options .option textarea').first().prop('name'));

	form.on('change', '.set-answer-number', function () {
		var options = $('.answer-options .option');
		var set = parseInt($(this).val().toString());
		if (set > options.length)
		{
			for (var i = options.length; i < set; i++)
			{
				var n = option.clone();
				$('.answer-options').append(n);
				n.find('textarea, input:checkbox').each(function () {
					$(this).prop('name', $(this).prop('name').replace(/\[(\d)\]/, '[' + i + ']'));
					if ($(this).is('textarea'))
					{
						CKEDITOR.inline($(this).prop('name'));
					}
				});
			}
		}
		else
		{
			options.slice(set).each(function () {
				var name = $(this).find('textarea').prop('name');
				$(this).remove();
				CKEDITOR.instances[name].destroy();
			});
		}

	});
	form.submit(function () {
		if (!$(this).find('.answer-options input:checked').length)
		{
			$.alert({
				title: 'Thông báo',
				content: 'Phải chọn ít nhất một đáp án đúng !',
				type: 'blue'
			});
			return false;
		}
		if (!$(this).find('.answer-options input:checkbox:not(:checked)').length)
		{
			$.alert({
				title: 'Thông báo',
				content: 'Phải có ít nhất một phương án loại trừ !',
				type: 'blue'
			});
			return false;
		}
	});
	form.find('select.set-answer-number').val(4).trigger('change');
});
