<?php

ini_set('display_errors', '1');

set_error_handler(function($severity, $message, $file, $line) {
    throw new ErrorException($message, $severity, $severity, $file, $line);
});

spl_autoload_register(function($class){
	$class = str_replace('\\', '/', $class . '.php');
	if (file_exists($class) or file_exists(
		$_SERVER['DOCUMENT_ROOT'] . '/' .
		strtolower(dirname($class)) . '/' .
		basename($class)
	))
	{
		require_once $class;
	}
});
