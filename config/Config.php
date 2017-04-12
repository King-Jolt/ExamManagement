<?php

$config['db'] = array(
	'driver' => 'mysql',
	'host' => 'localhost',
	'user' => 'root',
	'password' => '',
	'db' => 'exam_management'	
);

$config['routes'] = array(
	/** Require Login */
	'/' => 'Admin\Login',
	'/admin/login' => 'Admin\Login',
	/** Logout */
	'/admin/logout' => 'Admin\Admin::logout',
	/** Category Manage */
	'/admin/category' => 'Admin\Category',
	'/admin/category/gettree' => 'Admin\Category:getTreeData',
	'/admin/category/create' => 'Admin\Category:insertCategory',
	'/admin/category/{category_id}/create' => 'Admin\Category:insertCategory',
	'/admin/category/{category_id}/edit' => 'Admin\Category:editCategory',
	'/admin/category/{category_id}/delete' => 'Admin\Category:deleteCategory',
	/** Exam Manage */
	'/admin/category/{category_id}/exam' => 'Admin\Exam',
	'/admin/category/{category_id}/exam/create' => 'Admin\Exam:createExam',
	'/admin/category/{category_id}/exam/{exam_id}/delete' => 'Admin\Exam:deleteExam',
	'/admin/category/{category_id}/exam/{exam_id}/edit' => 'Admin\Exam:editExam',
	'/admin/category/{category_id}/exam/{exam_id}/share' => 'Admin\Exam:setVisible',
	'/admin/category/{category_id}/exam/{exam_id}/shuffle' => 'Admin\Exam:shuffleExam',
	'/admin/category/{category_id}/exam/{exam_id}/preview' => 'Admin\Exam:previewExam',
	/** Group Manage */
	'/admin/category/{category_id}/exam/{exam_id}/group' => 'Admin\Group',
	'/admin/category/{category_id}/exam/{exam_id}/group/create' => 'Admin\Group:createGroup',
	'/admin/category/{category_id}/exam/{exam_id}/group/{group_id}/edit' => 'Admin\Group:editGroup',
	'/admin/category/{category_id}/exam/{exam_id}/group/{group_id}/delete' => 'Admin\Group:deleteGroup',
	/** Question Manage */
	'/admin/category/{category_id}/exam/{exam_id}/group/{group_id}/question' => 'Admin\Question',
	'/admin/category/{category_id}/exam/{exam_id}/group/{group_id}/question/insert/{question_type}' => 'Admin\Question:insertQuestion'	
);

?>