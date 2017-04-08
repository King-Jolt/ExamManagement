<?php

$config['db'] = array(
	'driver' => 'mysql',
	'host' => 'localhost',
	'user' => 'root',
	'password' => '',
	'db' => 'exam_management'	
);

$config['routes'] = array(
	'/demo' => 'Test\Main',
	/** Require Login */
	'/' => 'Admin\Login',
	'/admin/login' => 'Admin\Login',
	/** Logout */
	'/admin/logout' => 'Admin\Admin::logout',
	/** Category Manage */
	'/admin/category' => 'Admin\Category',
	'/admin/category/gettree' => 'Admin\Category:get',
	'/admin/category/create' => 'Admin\Category:create',
	'/admin/category/{category_id}/create' => 'Admin\Category:create',
	'/admin/category/{category_id}/edit' => 'Admin\Category:edit',
	'/admin/category/{category_id}/delete' => 'Admin\Category:delete',
	/** Exam Manage */
	'/admin/category/{category_id}/exam' => 'Admin\Exam',
	'/admin/category/{category_id}/exam/create' => 'Admin\Exam:create',
	'/admin/category/{category_id}/exam/{exam_id}/delete' => 'Admin\Exam:delete',
	'/admin/category/{category_id}/exam/{exam_id}/edit' => 'Admin\Exam:edit',
	'/admin/category/{category_id}/exam/{exam_id}/share' => 'Admin\Exam:share',
	/** Group Manage */
	'/admin/category/{category_id}/exam/{exam_id}/group' => 'Admin\Group',
	'/admin/category/{category_id}/exam/{exam_id}/group/create' => 'Admin\Group:create',
	'/admin/category/{category_id}/exam/{exam_id}/group/{group_id}/edit' => 'Admin\Group:edit',
	'/admin/category/{category_id}/exam/{exam_id}/group/{group_id}/delete' => 'Admin\Group:delete',
	/** Question Manage */
	'/admin/category/{category_id}/exam/{exam_id}/group/{group_id}/question' => 'Admin\Question'
);

?>