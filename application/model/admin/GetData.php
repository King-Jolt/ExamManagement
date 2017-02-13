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
	public static function get_Question($id, $type)
	{
		switch ($type)
		{
			case self::$types['link']:
			{
				return new Sql_QueryCommand('CALL link_question(?)', array($id));
			}
			case self::$types['multiple-choice']:
			{
				return new Sql_QueryCommand('CALL multiple_choice_question(?)', array($id));
			}
			/*
			case self::$types['fill']:
			{
				//
			}
			 * 
			 */
		}
	} 
}

?>