<?php

$config['base_url'] = sprintf('http%s://%s', isset($_SERVER['HTTPS']) ? 's' : '', $_SERVER["HTTP_HOST"]);

$config['db'] = array(
	'driver' => 'mysql',
	'host' => 'localhost',
	'user' => 'root',
	'password' => '',
	'db' => 'exam_management'	
);

$config['routes'] = array(
	'/demo' => 'Test\Main',
	'/' => 'Admin\Login',
	'/admin/login' => 'Admin\Login',
	'/admin/logout' => 'Admin\Admin::logout',
	'/admin/category' => 'Admin\Category',
	'/admin/category/load' => 'Admin\Category:load',
	'/admin/category/create' => 'Admin\Category:create',
	'/admin/category/{category_id}/create' => 'Admin\Category:create',
	'/admin/category/{category_id}/edit' => 'Admin\Category:edit',
	'/admin/category/{category_id}/delete' => 'Admin\Category:delete',
	'/admin/category/{category_id}/exam' => 'Admin\Exam',
	'/admin/category/{category_id}/exam/create' => 'Admin\Exam:create',
	'/admin/category/{category_id}/exam/{exam_id}/delete' => 'Admin\Exam:delete',
	'/admin/category/{category_id}/exam/{exam_id}/edit' => 'Admin\Exam:edit',
	'/admin/category/{category_id}/exam/{exam_id}/group' => 'Admin\Group',
	'/admin/category/{category_id}/exam/{exam_id}/group/create' => 'Admin\Group:create',
	'/admin/category/{category_id}/exam/{exam_id}/group/{group_id}/delete' => 'Admin\Group:delete'
);

?>