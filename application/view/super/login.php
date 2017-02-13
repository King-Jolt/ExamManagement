<div class="container-fluid">
	<div class="row">
		<div class="col-xs-4 col-xs-offset-4">
			<div class="top-25">
				<form class="panel panel-success" method="post">
					<div class="panel-heading"><strong><span class="glyphicon glyphicon-cog"></span>&nbsp; Đăng nhập hệ thống </strong></div>
					<div class="panel-body">
						<?php self::put($msg) ?>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
								<input type="text" class="form-control" placeholder="Tài khoản" name="user" autofocus />
							</div>
						</div>
						<div>
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
								<input type="password" class="form-control" placeholder="Mật khẩu" name="pass" />
							</div>
						</div>
					</div>
					<div class="panel-footer text-right">
						<button type="submit" class="btn btn-success" name="btn-action" value="login"><strong><span class="glyphicon glyphicon-log-in"></span>&nbsp; Đăng nhập </strong></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
