<div class="container">
	<div class="row">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand"> Tạo và quản lý đề thi </a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> Teacher </a></li>
				</ul>
			</div>
		</nav>
	</div>
	<div class="row">
		<div class="col-xs-3 no-padding sidebar">
			<ul class="nav nav-pills nav-stacked">
				<li class="<?php self::put($menu['1']['active']) ?>"><a href="/admin/index.php"> Danh mục bài kiểm tra </a></li>
				<li class="<?php self::put($menu['2']['active']) ?>"><a href="#"> Mục phụ </a></li>
			</ul>
		</div>
		<div class="col-xs-9 no-padding">
			<div class="inner-content">
				<?php self::put($content) ?>
			</div>
		</div>
	</div>
</div>