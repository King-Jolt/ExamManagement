<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="icon" href="/asset/default/icon.png" />
		<link rel="stylesheet" href="/extension/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="/extension/owner/css/custom.css" />
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<script src="/extension/jquery/jquery-1.12.4.min.js"></script>
		<script src="/extension/bootstrap/js/bootstrap.js"></script>
		<script src="/extension/owner/js/app.js"></script>
		<title> Exam Management </title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3">
					<div class="top-25">
						<form class="panel panel-primary" method="post">
							<div class="panel-heading"><strong><span class="glyphicon glyphicon-cog"></span>&nbsp; Đăng nhập vào ứng dụng </strong></div>
							<div class="panel-body">
								<?php self::put($msg) ?>
								
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-user"></span></span>
										<input type="text" class="form-control" placeholder="Tài khoản" name="user" autofocus />
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-lock"></span></span>
										<input type="password" class="form-control" placeholder="Mật khẩu" name="pass" />
									</div>
								</div>
								<div>
									<div class="input-group">
										<span class="input-group-addon"><span class="fa fa-book"></span></span>
										<select class="form-control" name="course">
											<option value="0"> -- Chọn bộ môn -- </option>
											<?php foreach ($course_data as $c) {
												echo "<option value=\"$c->id\"> $c->name </option>";
											}?>
										</select>
									</div>
								</div>
							</div>
							<div class="panel-footer">
								<button type="submit" class="btn btn-primary" name="action" value="login"><strong><span class="fa fa-sign-in"></span>&nbsp; Đăng nhập </strong></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>