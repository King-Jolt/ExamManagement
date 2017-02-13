<div class="container">
	<div class="row">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand"> User Management </a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Administrator <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li class="<?php self::put($menu['1']['active']) ?>"><a href="/admin/index.php"> Danh sách bộ môn </a></li>
							<li class="divider"></li>
							<li><a href="#"><span class="glyphicon glyphicon-lock"></span> Đổi mật khẩu </a></li>
							<li><a href="/super/logout.php"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất  </a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	<div class="row">
		<div class="col-xs-12 no-padding">
			<div class="inner-content">
				<?php self::put($content) ?>
			</div>
		</div>
	</div>
</div>