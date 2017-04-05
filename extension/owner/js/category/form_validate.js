$(document).ready(function() {
	$('form.category-form').validate({
		rules : {
			name : {
				required : true
			}
		},
		messages: {
			name : {
				required : 'Tên danh mục không được để trống'
			}
		},
		errorPlacement : function(error, element) {
			element.closest('.form-inline').append(error);
		},
		errorClass: 'text-danger'
	});
}); 
