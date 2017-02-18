<div class="modal fade ckeditor" id="ck-modal-input" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"> Nhập văn bản nâng cao - CKEDITOR </h4>
			</div>
			<div class="modal-body">
				<textarea id="ckinput"></textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default save" data-dismiss="modal"> Lưu </button>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	CKEDITOR.config.height = 120;
	CKEDITOR.config.htmlEncodeOutput = false;
	CKEDITOR.config.entities = false;
	CKEDITOR.config.autoParagraph = false;
	CKEDITOR.config.showProcessingMessages = false;
	CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
	//CKEDITOR.config.mathJaxLib = '/extension/mathjax/MathJax.js?config=TeX-MML-AM_CHTML';
	CKEDITOR.config.mathJaxLib = 'https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML';
	CKEDITOR.config.mathJaxClass = 'equation';
	CKEDITOR.replace('ckinput');
	$('.form-hint').html('<div class="form-group"><a href="javascript:void(0)" data-toggle="popover" data-content="Kích đúp chuột vào ô nhập để gõ văn bản dạng nâng cao."><span class="glyphicon glyphicon-hand-right"></span>&nbsp; Phương thức nhập </a></div>');
	$('body').popover({
		trigger: 'hover',
		selector: '[data-toggle="popover"]'
	});
	var field = new (function(){
		var obj = 0;
		this.save = function(o){
			obj = o;
		};
		this.get = function(){
			return obj;
		};
	})();
	$('form').on('dblclick', 'input[name]:not([type="number"])', function(){
		field.save($(this));
		CKEDITOR.instances['ckinput'].setData($(this).val());
		$('#ck-modal-input').modal();
	});
	$('#ck-modal-input').on('shown.bs.modal', function(){
		CKEDITOR.instances['ckinput'].focus();
	});
	$('#ck-modal-input .save').click(function(){
		field.get().val(CKEDITOR.instances['ckinput'].getData());
	});
});
</script>