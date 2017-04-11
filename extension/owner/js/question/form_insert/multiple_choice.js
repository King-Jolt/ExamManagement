$(document).ready(function(){
	$('form#add-multiple-choice').validate({
		rules: {
			content: {
				required: true
			}
		},
		errorClass: 'text-danger'
	});
	$('form#add-multiple-choice').on('change', '.set-answer-number', function(){
		var options = $('ol.answer-options');
		var opt = options.find('li');
		var set = parseInt($(this).val().toString());
		if (set > opt.length)
		{
			for (var i = opt.length; i < set; i++)
			{
				var new_option = opt.first().clone();
				new_option.find('input[type="text"], input:checkbox').each(function(){
					$(this).prop('name', $(this).prop('name').replace(/\[(\d)\]/, '[' + i + ']'));
					if ($(this).is('input:checkbox'))
					{
						$(this).removeProp('checked');
					}
					else
					{
						$(this).val('');
					}
				});
				options.append(new_option);
			}
		}
		else
		{
			opt.slice(set).remove();
		}
	})
	.submit(function(){
		if (!$(this).find('ol.answer-options input:checked').length)
		{
			$.alert({
				title: 'Thông báo',
				content: 'Phải chọn ít nhất một đáp án đúng !',
				type: 'blue'
			});
			return false;
		}
		if (!$(this).find('ol.answer-options input:checkbox:not(:checked)').length)
		{
			$.alert({
				title: 'Thông báo',
				content: 'Phải có ít nhất một phương án loại trừ !',
				type: 'blue'
			});
			return false;
		}
	})
	.find('select.set-answer-number').val(4).trigger('change');
});
