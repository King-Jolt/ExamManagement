<style>
	body
	{
		padding-top: 50px;
	}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 no-padding" id="main-navbar">
			<nav class="navbar navbar-default navbar-fixed-top no-margin">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-collapse-navbar-menu" aria-expanded="false">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="javascript:$.alert({title: 'Thông tin', content: 'Phiên bản : 2016.2 <br />Design by : scila1996<br /><em>Thanh you for using !</em>', type: 'green'})" class="navbar-brand"><strong> Phần mềm quản lý đề thi </strong></a>
					</div>
					<div class="collapse navbar-collapse" id="bs-collapse-navbar-menu">
						<ul class="nav navbar-nav navbar-right">
							<!--
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-bell"> </span><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li class="dropdown-header"><span class="glyphicon glyphicon-globe"></span>&nbsp; Thông báo </li>
									<li class="divider"></li>
									<li><a href="#"> Không có thông báo </a></li>
								</ul>
							</li>
							-->
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php self::put($user->user) ?> <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li class="dropdown-header">Giáo viên : <?php self::put($user->name) ?> </li>
									<li class="divider"></li>
									<li class="<?php self::put($menu['account']['active']) ?>"><a href="<?php self::put($menu['account']['href']) ?>"><span class="glyphicon glyphicon-cog"></span> Quản lý tài khoản </a></li>
									<li><a href="<?php self::put($menu['logout']['href']) ?>"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất  </a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-3 no-padding">
			<div class="sidebar" id="main-sidebar">
				<div class="heading">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Tìm kiếm &quot;Danh mục; Đề thi&quot;" />
						<span class="input-group-btn"><button class="btn btn-primary" onclick="$.alert({title: 'Thông báo', content: 'Chức năng đang được hoàn thiện'})"><span class="glyphicon glyphicon-search"></span></button></span>
					</div>
				</div>
				<div style="/* overflow: auto; height: 80%; */">
					<div class="list-group no-border-radius">
						<a href="<?php self::put($menu['home']['href']) ?>" class="list-group-item <?php self::put($menu['home']['active']) ?>"><span class="glyphicon glyphicon-home"></span>&nbsp; Trang chủ </a>
						<a href="<?php self::put($menu['manage']['href']) ?>" class="list-group-item <?php self::put($menu['manage']['active']) ?>"><span class="glyphicon glyphicon-th-list"></span>&nbsp; Quản lý đề thi </a>
						<a href="<?php self::put($menu['account']['href']) ?>" class="list-group-item <?php self::put($menu['account']['active']) ?>"><span class="glyphicon glyphicon-lock"></span>&nbsp; Quản lý tài khoản </a>
						<a href="<?php self::put($menu['contact']['href']) ?>" class="list-group-item <?php self::put($menu['contact']['active']) ?>"><span class="glyphicon glyphicon-phone-alt"></span>&nbsp; Liên hệ </a>
						<a href="<?php self::put($menu['about']['href']) ?>" class="list-group-item <?php self::put($menu['about']['active']) ?>"><span class="glyphicon glyphicon-info-sign"></span>&nbsp; Thông tin </a>
					</div>
					<div class="footer text-muted">
						© Copyright by <strong> scila1996 </strong>
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