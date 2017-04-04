<?php

namespace Application\Model\Admin;

use System\Database\DB;

class GetData
{
	public static $types = array(
		'link' => 1,
		'multiple-choice' => 2,
		'fill' => 4
	);
	public static function list_Question($user_id, $category_id, $exam_id)
	{
		$query = 'SELECT list_question.* FROM list_question WHERE user_id = ? AND category_id = ? AND exam_id = ? ORDER BY position';
		$param = array($user_id, $category_id, $exam_id);
		return DB::query($query, $param);
	}
	public static function get_Exam($user_id, $category_id, $exam_id)
	{
		$query = 'SELECT list_exam.* FROM list_exam WHERE user_id = ? AND category_id = ? AND id = ?';
		$param = array($user_id, $category_id, $exam_id);
		return DB::query($query, $param);
	}
	public static function get_Question($user_id, $category_id, $exam_id)
	{
		return DB::query('CALL list_question_by_exam(?, ?, ?)', array($user_id, $category_id, $exam_id));
	}
	public static function list_PublicExam($course_id, $user_id, $exam_id)
	{
		return DB::query('CALL list_shared_exam(?, ?, ?)', array($course_id, $user_id, $exam_id));
	}
}

?>