<div class="container frame-style">
	<div class="row">
		<div class="col-xs-12 no-padding" id="main-navbar">
			<nav class="navbar navbar-inverse navbar-static-top no-margin">
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
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> Danh mục <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#" class="<?php self::put($menu['1']['active']) ?>"><span class="glyphicon glyphicon-home"></span>&nbsp; Trang chủ </a></li>
									<li class="<?php self::put($menu['manage']['active']) ?>"><a href="<?php self::put($menu['manage']['active']) ?>"><span class="glyphicon glyphicon-th-list"></span>&nbsp; Danh sách môn học </a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php self::put($user->user) ?> <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li class="dropdown-header"> QUẢN TRỊ VIÊN : <?php self::put($user->name) ?> </li>
									<li class="divider"></li>
									<li class="<?php self::put($menu['chpw']['active']) ?>"><a href="<?php self::put($menu['chpw']['href']) ?>"><span class="glyphicon glyphicon-lock"></span> Đổi mật khẩu </a></li>
									<li><a href="<?php self::put($menu['logout']['href']) ?>"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất  </a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="col-xs-12 no-padding">
			<div class="inner-content">
				<h4 class="text-muted"> Danh mục quản lý môn học, tài khoản cho các giáo viên </h4>
				<hr />
				<?php self::put($nav) ?>
				<?php self::put($content) ?>
			</div>
		</div>
	</div>
</div>
