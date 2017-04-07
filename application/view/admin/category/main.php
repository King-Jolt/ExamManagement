<link rel="stylesheet" href="/extension/bootstrap-treeview/bootstrap-treeview.min.css" />
<script src="/extension/bootstrap-treeview/bootstrap-treeview.min.js"></script>
<script src="/extension//owner/js/category/app.js"></script>
<?php self::put($msg) ?>
<div class="container-fixed">
	<div class="row">
		<div class="col-md-3">
			<div class="panel panel-info" id="category-info">
				<div class="panel-heading"> Thông tin danh mục </div>
				<div class="panel-body">
					<p> Tên danh mục : <span class="name"></span></p>
					<p> Số danh mục con : <span class="child"></span></p>
					<p> Số đề thi : <span class="exam"></span></p>
					<p> Số đề thi chia sẻ :  <span class="share"></span></p>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div id="tree"></div>
		</div>
	</div>
</div>