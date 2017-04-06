<?php

require_once 'autoload.php';

use System\Core\Bootstrap;
use System\Core\Exception;

try
{
	Bootstrap::load();
}
catch (Exception\Controller_NotAvailable $e)
{
	echo 'Trang này không tồn tại, vui lòng thử lại ! <a href="/"> Trang chủ </a>';
	http_response_code(403);
	exit(403);
}
catch (\Exception $e)
{
	?>
	<!DOCTYPE HTML>
	<html>
		<head>
			<title> Error </title>
			<style>
				.exception-info tr td:first-child
				{
					font-weight: bold;
					padding-right: 15px;
				}
				.exception-info tr td:first-child:after
				{
					content: ':';
				}
			</style>
		</head>
		<body>
			<h4> Error Exception : <span style="color: #048CAD"> <?php echo get_class($e) ?> </span></h4>
			<hr />
			<table class="exception-info">
				<tbody>
					<tr>
						<td> Message </td>
						<td> <?php echo $e->getMessage() ?> </td>
					</tr>
					<tr>
						<td> Code </td>
						<td> <?php echo $e->getCode() ?> </td>
					</tr>
					<tr>
						<td> File </td>
						<td> <?php echo $e->getFile() ?> </td>
					</tr>
					<tr>
						<td> Line Number </td>
						<td> <?php echo $e->getLine() ?> </td>
					</tr>
				</tbody>
			</table>
			<hr />
			<pre><?php echo $e->getTraceAsString() ?></pre>
			<hr />
			<p style="background-color: #cccccc; color: #990033; padding: 5px"><strong> Error Time</strong>: <?php echo date("F j, Y, g:i a"); ?> </p>
			<em> Please report this error to "Administrator" </em>
		</body>
	</html>
	<?php
	exit;
}

?>