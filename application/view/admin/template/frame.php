<div class="container frame-style">
	<div class="row">
		<div class="col-xs-12 no-padding" id="main-navbar">
			<nav class="navbar navbar-default navbar-static-top no-margin">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-collapse-navbar-menu" aria-expanded="false">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="javascript:void(0)" class="navbar-brand" id="about"><strong> Phần mềm quản lý đề thi </strong></a>
					</div>
					<div class="collapse navbar-collapse" id="bs-collapse-navbar-menu">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> Danh mục <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li class="dropdown-header"> Danh mục tùy chọn <span class="caret"></span></li>
									<li class="divider"></li>
									<li class="<?php self::put($menu['home']['active']) ?>"><a href="<?php self::put($menu['home']['href']) ?>"><span class="glyphicon glyphicon-calendar"></span>&nbsp; Xem lịch thi </a></li>
									<li class="<?php self::put($menu['manage']['active']) ?>"><a href="<?php self::put($menu['manage']['href']) ?>"><span class="glyphicon glyphicon-th-list"></span>&nbsp; Quản lý đề thi </a></li>
									<li class="<?php self::put($menu['contact']['active']) ?>"><a href="<?php self::put($menu['contact']['href']) ?>"><span class="glyphicon glyphicon-phone-alt"></span>&nbsp; Liên hệ </a></li>
									<li class="<?php self::put($menu['about']['active']) ?>"><a href="<?php self::put($menu['about']['href']) ?>"><span class="glyphicon glyphicon-info-sign"></span>&nbsp; Thông tin </a></li>
								</ul>
							</li>
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
						<form class="navbar-form navbar-right" method="post">
							<div class="input-group">
								<input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm ...">
								<span class="input-group-btn"><button class="btn btn-default" type="submit" name="action" value="search" ><span class="glyphicon glyphicon-search"></span></button></span>
							</div>
					    </form>
					</div>
				</div>
			</nav>
		</div>
		<div class="col-xs-12 no-padding">
			<div class="inner-content">
				<?php self::put($nav) ?>
				<?php self::put($content) ?>
			</div>
		</div>
	</div>
</div>
