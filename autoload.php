<?php

ini_set('display_errors', '1');

set_error_handler(function($severity, $message, $file, $line) {
    throw new ErrorException($message, $severity, $severity, $file, $line);
});

spl_autoload_register(function($class){
	$path = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT'] . '/' . $class . '.php');
	$files[] = $path;
	$files[] = strtolower(dirname($path)) . '/' . basename($path);
	foreach ($files as $file)
	{
		if (file_exists($file))
		{
			require_once $file;
		}
	}
});

?>