<style>
	body
	{
		padding-top: 50px;
	}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 no-padding" id="main-navbar">
			<nav class="navbar navbar-default navbar-fixed-top no-margin no-border-radius">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand"><strong> Phần mềm quản lý đề thi </strong></a>
					</div>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php self::put($user->user) ?> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li class="dropdown-header"> QUẢN TRỊ VIÊN : <?php self::put($user->name) ?> </li>
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
			<div class="sidebar" id="main-sidebar">
				<div class="heading">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Tìm kiếm giáo viên" />
						<span class="input-group-btn"><button class="btn btn-primary" onclick="$.alert({title: 'Thông báo', content: 'Chức năng đang được hoàn thiện'})"><span class="glyphicon glyphicon-search"></span></button></span>
					</div>
				</div>
				<div style="/* overflow: auto; height: 80%; */">
					<div class="list-group no-border-radius">
						<a href="#" class="list-group-item <?php self::put($menu['1']['active']) ?>"><span class="glyphicon glyphicon-home"></span>&nbsp; Trang chủ </a>
						<a href="/super/index.php" class="list-group-item active <?php self::put($menu['2']['active']) ?>"><span class="glyphicon glyphicon-th-list"></span>&nbsp; Danh sách môn học </a>
					</div>
					<div class="footer text-muted">
						© Copyright by <strong> scila1996 </strong> - <a href="https://github.com/scila1996/ExamManagement" target="_blank"> GitHub </a>
					</div>
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
