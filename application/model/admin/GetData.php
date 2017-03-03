<?php

namespace App\Model\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/database/Sql_QueryCommand.php';

use App\System\Database\Sql_QueryCommand;

class GetData
{
	public static $types = array(
		'link' => 1,
		'multiple-choice' => 2,
		'fill' => 4
	);
	public static function list_Category($user_id, $where_name = '')
	{
		$query = 'SELECT list_category.* FROM list_category WHERE list_category.user_id = ? AND list_category.name REGEXP ?';
		$param = array($user_id, $where_name);
		return new Sql_QueryCommand($query, $param);
	}
	public static function list_Exam($user_id, $category_id, $where_title = '')
	{
		$query = 'SELECT list_exam.* FROM list_exam WHERE user_id = ? AND category_id = ? AND title REGEXP ?';
		$param = array($user_id, $category_id, $where_title);
		return new Sql_QueryCommand($query, $param);
	}
	public static function list_Question($user_id, $category_id, $exam_id)
	{
		$query = 'SELECT list_question.* FROM list_question WHERE user_id = ? AND category_id = ? AND exam_id = ? ';
		$query .= 'ORDER BY position';
		$param = array($user_id, $category_id, $exam_id);
		return new Sql_QueryCommand($query, $param);
	}
	public static function get_Exam($user_id, $category_id, $exam_id)
	{
		$query = 'SELECT list_exam.* FROM list_exam WHERE user_id = ? AND category_id = ? AND id = ?';
		$param = array($user_id, $category_id, $exam_id);
		return new Sql_QueryCommand($query, $param);
	}
	public static function get_Question($user_id, $category_id, $exam_id)
	{
		return new Sql_QueryCommand('CALL list_question_by_exam(?, ?, ?)', array($user_id, $category_id, $exam_id));
	}
	public static function list_PublicExam($course_id, $user_id, $exam_id)
	{
		return new Sql_QueryCommand('CALL list_shared_exam(?, ?, ?)', array($course_id, $user_id, $exam_id));
	}
}

?>