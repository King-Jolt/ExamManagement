$(document).ready(function(){
	$('form#group [name="has-content"]').on('change', function(){
		$(this).closest('form').find('[name="content"]').prop('disabled', !$(this).prop('checked'));
	}).trigger('change');
	$('form#group').validate({
		rules: {
			title: {
				required: true,
			},
			content: {
				required: true
			}
		},
		errorClass: 'text-danger'
	});
});