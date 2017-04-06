<?php

namespace Application\Model\Admin\Group;

use System\Database\DB;
use System\Libraries\Request;
use System\Libraries\Auth;
use Application\Model\Misc;

class Model
{
	private static $id = array();
	public static function listGroup()
	{
		$query = DB::query()->select(['g.*', 'COUNT(q.id) AS n_question'])
			->from('question_group', 'g')
			->innerJoin('exam', 'e', 'e.id = g.exam_id')
			->innerJoin('category', 'c', 'c.id = e.category_id')
			->leftJoin('question', 'q', 'q.group_id = g.id')
			->where([
				'c.user_id' => self::$id['user'],
				'e.category_id' => self::$id['category'],
				'g.exam_id' => self::$id['exam']
			])
			->group_by('g.id');
		return $query;
	}
	public static function baseUri()
	{
		return '/admin/category/' . self::$id['category'] .
				'/exam/' . self::$id['exam'] . '/group';
	}
	public function __construct()
	{
		self::$id = array(
			'user' => Auth::get()->id,
			'category' => Request::params()['category_id'],
			'exam' => Request::params()['exam_id']
		);
	}
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