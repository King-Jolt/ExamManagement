<?php

namespace Application\Model\Admin\Group;

use System\Database\DB;
use System\Libraries\Request;
use System\Libraries\Auth;
use Application\Model\Misc;

class Model
{
	public static $user_id = NULL;
	public static $category_id = NULL;
	public static $exam_id = NULL;
	public function getTable()
	{
		$table = new Table();
		return $table->get();
	}
	public function insertGroup($title, $content)
	{
		$id = Misc::get_uid();
		$query = DB::query()->insert('question_group', [
			'id' => $id,
			'title' => $title,
			'content' => $content,
			'exam_id' => self::$id['exam']
		]);
		if ($query->execute())
		{
			Misc::put_msg('success', 'Đã thêm mới một nhóm câu hỏi');
		}
		else
		{
			Misc::put_msg('danger', 'Có lỗi xảy ra, không thể tạo nhóm câu hỏi', FALSE);
		}
	}
	public function deleteGroup($id)
	{
		$query = DB::query()->delete('g')->from('question_group', 'g')
			->innerJoin(self::listGroup(), 'a', 'a.id = g.id')
			->where('g.id', $id);
		echo $query->get_Query() . '<br />';
		var_dump($query->get_Param());
		if ($query->execute())
		{
			Misc::put_msg('success', 'Đã xóa một nhóm câu hỏi');
		}
		else
		{
			Misc::put_msg('danger', 'Không thể xóa nhóm này !', FALSE);
		}
	}
}