<div class="container">
	<div class="row">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand"> Tạo và quản lý đề thi </a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php self::put($user->user) ?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li class="dropdown-header">Giáo viên : <?php self::put($user->name) ?> </li>
							<li class="divider"></li>
							<li><a href="#"><span class="glyphicon glyphicon-lock"></span> Đổi mật khẩu </a></li>
							<li><a href="/admin/logout.php"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất  </a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	<div class="row">
		<div class="col-xs-3 no-padding sidebar">
			<ul class="nav nav-pills nav-stacked">
				<li class="<?php self::put($menu['1']['active']) ?>"><a href="/admin/index.php"> Danh mục bài kiểm tra </a></li>
				<!-- <li class="<?php self::put($menu['2']['active']) ?>"><a href="#"> Mục phụ </a></li> -->
			</ul>
		</div>
		<div class="col-xs-9 no-padding">
			<div class="inner-content">
				<?php self::put($nav) ?>
				<?php self::put($content) ?>
			</div>
		</div>
	</div>
</div>