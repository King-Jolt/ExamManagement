<?php

$config['base_url'] = sprintf('http%s://%s', isset($_SERVER['HTTPS']) ? 's' : '', $_SERVER["HTTP_HOST"]);

// Database config

$config['db'] = array(
	'host' => 'localhost',
	'user' => 'root',
	'password' => '',
	'db' => 'exam_management',
	'port' => 3306,
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci'
);

/*
$config['db'] = array(
	'host' => 'localhost',
	'user' => 'nocut_trungnt',
	'password' => 'a9apymama5ym',
	'db' => 'nocuttree_exam',
	'port' => 3306,
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci'
);
*/

?>