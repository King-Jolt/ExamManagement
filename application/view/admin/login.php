<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="icon" href="/asset/default/icon.png" />
		<link rel="stylesheet" href="/extension/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="/extension/owner/css/custom.css" />
		<link rel="stylesheet" href="/extension/jquery-confirm/jquery-confirm.min.css" />
		<script src="/extension/jquery/jquery-1.12.4.min.js"></script>
		<script src="/extension/jquery/jquery.validate.js"></script>
		<script src="/extension/bootstrap/js/bootstrap.js"></script>
		<script src="/extension/jquery-confirm/jquery-confirm.min.js"></script>
		<script src="/extension/owner/js/app.js"></script>
		<title> Đăng nhập dành cho giáo viên </title>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-4 col-xs-offset-4">
					<div class="top-25">
						<form class="panel panel-primary" method="post">
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
							<div class="panel-footer">
								<div class="form-inline">
									<div class="input-group">
										<span class="input-group-addon"> Bộ môn </span>
										<select class="form-control" name="course">
											<option value="0"> -- Chọn bộ môn -- </option>
											<?php foreach($course_data as $c) { ?>
											<option value="<?php echo $c->id ?>"> <?php echo $c->name ?> </option>
											<?php } ?>
										</select>
									</div>
									<div class="pull-right">
										<button type="submit" class="btn btn-primary" name="btn-action" value="login"><strong><span class="glyphicon glyphicon-log-in"></span>&nbsp; Đăng nhập </strong></button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>