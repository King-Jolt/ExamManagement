<?php

namespace Application\Model\Admin\Group;

use System\Database\DB;
use System\Libraries\Request;
use System\Libraries\Auth;
use Application\Model\Misc;

class Model
{
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
			'exam_id' => Request::params('exam_id')
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
	public function getGroupById($id)
	{
		$data = new DataTable();
		return $data->filterId($id)->getGroup()->fetch();
	}
	public function updateGroup($id, $title, $content)
	{
		$query = DB::query()->update('question_group', 'g')
			->innerJoin('exam', 'e', 'e.id = g.exam_id')
			->innerJoin('category', 'c', 'c.id = e.category_id')
			->set([
				'g.title' => $title,
				'g.content' => $content
			])
			->where([
				'c.user_id' => Auth::get()->id,
				'e.category_id' => Request::params('category_id'),
				'g.exam_id' => Request::params('exam_id'),
				'g.id' => $id
			]);
		if ($query->execute())
		{
			Misc::put_msg('success', 'Cập nhật nhóm câu hỏi thành công');
		}
		else
		{
			Misc::put_msg('warning', 'Không có thay đổi nào được cập nhật !');
		}
	}

	public function deleteGroup($id)
	{
		$query = DB::query()->delete('g')->from('question_group', 'g')
			->innerJoin('exam', 'e', 'e.id = g.exam_id')
			->innerJoin('category', 'c', 'c.id = e.category_id')
			->where([
				'c.user_id' => Auth::get()->id,
				'e.category_id' => Request::params('category_id'),
				'g.exam_id' => Request::params('exam_id'),
				'g.id' => $id
			]);
		if ($query->execute())
		{
			Misc::put_msg('success', 'Đã xóa một nhóm câu hỏi');
		}
		else
		{
			Misc::put_msg('warning', 'Không thể xóa nhóm này !', FALSE);
		}
	}
}