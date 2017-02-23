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
	public static function list_Category($user_id)
	{
		$query = 'SELECT list_category.* FROM list_category WHERE list_category.user_id = ?';
		$param = array($user_id);
		return new Sql_QueryCommand($query, $param);
	}
	public static function get_Exam($exam_id)
	{
		$query = 'SELECT exam.* FROM exam WHERE exam.id = ?';
		$param = array($exam_id);
		return new Sql_QueryCommand($query, $param);
	}
	public static function list_Exam($category_id)
	{
		$query = 'SELECT list_exam.* FROM list_exam WHERE category_id = ?';
		$param = array($category_id);
		return new Sql_QueryCommand($query, $param);
	}
	public static function list_Question($exam_id)
	{
		$query = 'SELECT question.* FROM question WHERE question.exam_id = ? ';
		$query .= 'ORDER BY question.position';
		$param = array($exam_id);
		return new Sql_QueryCommand($query, $param);
	}
	public static function get_Question($exam_id)
	{
		return new Sql_QueryCommand('CALL list_question_by_exam(?)', array($exam_id));
	}
	public static function get_SharedExam($course_id, $except_exam_id)
	{
		return new Sql_QueryCommand('CALL list_shared_question_in_exam(?, ?)', array($course_id, $except_exam_id));
	}
}

?>