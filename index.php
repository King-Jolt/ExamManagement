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
	http_response_code(404);
	require $_SERVER['DOCUMENT_ROOT'] . '/system/page/404.html';
	exit;
}
catch (\Exception $e)
{
	$error = ob_get_contents();
	ob_clean();
	require $_SERVER['DOCUMENT_ROOT'] . '/system/page/error.html';
	exit;
}
