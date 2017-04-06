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
	include $_SERVER['DOCUMENT_ROOT'] . '/system/page/404.html';
	exit;
}
catch (\Exception $e)
{
	include $_SERVER['DOCUMENT_ROOT'] . '/system/page/error.html';
	exit;
}

?>