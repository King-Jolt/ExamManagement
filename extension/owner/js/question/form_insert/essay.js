$(document).ready(function(){
	$('form#add-essay-question').validate({
		rules: {
			content: {
				required: true
			}
		},
		errorClass: 'text-danger'
	});
});
