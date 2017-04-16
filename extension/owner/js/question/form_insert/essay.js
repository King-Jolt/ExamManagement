$(document).ready(function(){
	CKEDITOR.replace('content', { startupFocus: true } );
	$('form#add-essay-question').validate({
		ignore: [],
		rules: {
			content: {
				required: true
			}
		},
		messages: {
			content: {
				required: 'Hãy nhập dữ liệu câu hỏi vào đây'
			}
		},
		errorClass: 'text-danger'
	});
});
