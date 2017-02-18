<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 no-padding">
			<nav class="navbar navbar-inverse navbar-fixed-top no-margin no-border-radius">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand"><strong> Phần mềm quản lý đề thi </strong></a>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php self::put($user->user) ?> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li class="dropdown-header">Giáo viên : <?php self::put($user->name) ?> </li>
								<li class="divider"></li>
								<li><a href="#"><span class="glyphicon glyphicon-lock"></span> Đổi mật khẩu </a></li>
								<li><a href="/super/logout.php"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất  </a></li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-3 no-padding">
			<div class="sidebar">
				<div class="list-group no-border-radius">				
					<a href="/admin/index.php" class="list-group-item active">
						<span class="glyphicon glyphicon-book"></span>&nbsp; Danh sách bộ môn
					</a>			
				</div>
				<div class="footer text-muted">
					© Copyright by <a href="https://github.com/scila1996"> scila1996 </a>
				</div>
			</div>
		</div>
		<div class="col-xs-9 no-padding">
			<div class="inner-content">
				<?php self::put($nav) ?>
				<?php self::put($content) ?>
			</div>
		</div>
	</div>
</div>