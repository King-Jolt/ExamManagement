<?php

namespace App\Model\Admin;

require_once $_SERVER['DOCUMENT_ROOT'] . '/system/database/Sql_QueryCommand.php';

use App\System\Database\Sql_QueryCommand;

class GetData
{
	public static $types = array(
		'link' => 1,
		'mchoice' => 2,
		'fill' => 4
	);
	public static function list_Exam()
	{
		$query = 'SELECT * FROM list_exam WHERE 1 ';
		return new Sql_QueryCommand($query);
	}
	public static function list_Question($exam_id)
	{
		$query = 'SELECT question.* FROM question WHERE question.exam_id = ? ';
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
		}
	} 
}

?>