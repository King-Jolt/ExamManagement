<?php

$config['base_url'] = sprintf('http%s://%s', isset($_SERVER['HTTPS']) ? 's' : '', $_SERVER["HTTP_HOST"]);

// Database config

$config['db'] = array(
	// Primary part
	'host' => 'localhost',
	'user' => 'root',
	'password' => '',
	'db' => 'exam_management',
	// Secondary part
	'port' => 3306,
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci'
);

?>