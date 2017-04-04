<?php

namespace App\Model\Super;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/database/Sql_QueryCommand.php';

use System\Database\Sql_QueryCommand;

class GetData
{
	public static $types = array(
		'link' => 1,
		'multiple-choice' => 2,
		'fill' => 4
	);
	public static function list_Course()
	{
		$query = 'SELECT list_course.* FROM list_course';
		return new Sql_QueryCommand($query);
	}
	public static function list_User($course_id)
	{
		$query = 'SELECT list_user.* FROM list_user WHERE course_id = ?';
		$param = array($course_id);
		return new Sql_QueryCommand($query, $param);
	}
}

?>