<div class="modal fade" role="dialog">
	<div class="modal-dialog" style="width: 210mm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"> Chọn câu hỏi </h4>
			</div>
			<div class="modal-body">
				<?php self::put($data) ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"> Đóng </button>
			</div>
		</div>
	</div>
</div>
<script>
	MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
	q_view();
	obj_q.show();
</script>