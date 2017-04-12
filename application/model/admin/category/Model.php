<?php

namespace Application\Model\Admin\Category;

use System\Libraries\Auth;
use System\Database\DB;
use Application\Model\Misc;

class Model
{
	private function Tree_Traversal($id, $list, $callback)
	{
		$stack = array();
		$result = new DataTable();
		if ($id)
		{
			$result->filterParent($id);
		}
		else
		{
			$result->filterParent(NULL);
		}
		$result = $result->getCategory();
		while (TRUE)
		{
			if ($result->valid())
			{
				$data = $result->fetch();
				if ($data->child)
				{
					array_push($stack, (object)array(
						'sql_result' => $result,
						'arr_tree' => $list
					));
					$callback($data, TRUE, $list);
					$result = new DataTable();
					$result = $result->filterParent($data->id)->getCategory();
					continue;
				}
				$callback($data, FALSE, $list);
			}
			else
			{
				if (!empty($stack))
				{
					$pop = array_pop($stack);
					$result = $pop->sql_result;
					$list = $pop->arr_tree;
				}
				else
				{
					break;
				}
			}
		}
		return TRUE;
	}
	public function getTreeView()
	{
		$tree = new \ArrayObject(array());
		$this->Tree_Traversal('', $tree, function($data, $has_child, &$list) {
			$push = (object)array(
				'text' => " $data->name - $data->n_exam đề thi",
				'href' => "/admin/category/$data->id/exam",
				'nodeData' => $data
			);
			$list->append($push);
			if ($has_child)
			{
				$list = $push->nodes = new \ArrayObject(array());
			}
		});
		return $tree;
	}
	public function insertCategory($parent, $name)
	{
		$data = array(
			'id' => Misc::get_uid(),
			'parent' => $parent,
			'name' => $name,
			'user_id' => Auth::get()->id
		);
		DB::query()->insert('category', $data)->execute();
		Misc::put_msg('success', "Đã thêm mới một danh mục");
	}
	public function getCategoryById($id)
	{
		$data = new DataTable();
		return $data->filterId($id)->getCategory()->fetch();
	}
	public function updateCategory($id, $new_name)
	{
		$query = DB::query()
			->update('category')
			->set(['name' => $new_name])
			->where([
				'user_id' => Auth::get()->id,
				'id' => $id
			]);
		if ($query->execute())
		{
			Misc::put_msg('success', 'Đã cập nhật danh mục thành công');
		}
		else
		{
			Misc::put_msg('warning', 'Danh mục chưa được cập nhật', FALSE);
		}
	}
	public function deleteCategory($id)
	{
		$list_id = new \ArrayObject(array($id));
		$this->Tree_Traversal($id, $list_id, function($data, $has_child, $list){
			$list->append($data->id);
		});
		$r = 0;
		$list_id->exchangeArray(array_reverse($list_id->getArrayCopy()));
		DB::begin();
		foreach ($list_id as $id)
		{
			$query = DB::query()
				->delete()->from('category')
				->where([
					'user_id' => Auth::get()->id,
					'id' => $id
				]);
			if ($query->execute())
			{
				$r += 1;
			}
			else
			{
				DB::rollback();
				Misc::put_msg('danger', "Có lỗi xảy ra khi xóa danh mục này", FALSE);
				return FALSE;
			}
		}
		DB::commit();
		Misc::put_msg('success', "Đã xóa $r danh mục !");
		return TRUE;
	}
}
