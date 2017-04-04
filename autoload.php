<?php

ini_set('display_errors', 1);

set_error_handler(function($severity, $message, $file, $line) {
    throw new ErrorException($message, $severity, $severity, $file, $line);
});

spl_autoload_register(function($class){
	$path = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] . '/' . $class);
	$dirname = strtolower(dirname($path));
	$basename = basename($path) . '.php';
	$file = $dirname . '/' . $basename;
	if (file_exists($file))
	{
		require_once $file;
	}
	else
	{
		return FALSE;
	}
});

?>