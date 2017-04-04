<?php

namespace Application\Model\Admin\Category;

use System\Database\DB;
use System\Libraries\Request;
use System\Libraries\View;

use Application\Model\Misc;

class Model extends \System\Core\Model
{
	private $uid = NULL;
	public static function list_Category()
	{
		return call_user_func_array(array(DB::query()->select()->from('list_category'), 'where'), func_get_args());
	}
	public static function Tree_Traversal($uid, $id, $list, $callback)
	{
		$stack = array();
		$result = NULL;
		if ($id)
		{
			$result = self::list_Category(array(
				'user_id' => $uid,
				'parent' => $id
			));
		}
		else
		{
			$result = self::list_Category(array(
				array('user_id', $uid),
				array('parent', 'IS', NULL)
			));
		}
		$result = $result->execute();
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
					$result = self::list_Category(array(
						'user_id' => $uid,
						'parent' => $data->id
					))->execute();
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
	public function __construct($id)
	{
		$this->uid = $id;
	}
	public function getTreeView()
	{
		$curi = "/admin/category";
		$tree = new \ArrayObject(
			array(
				(object)array(
					'text' => "Thư mục gốc <a href=\"$curi/create\" class=\"pull-right btn btn-primary btn-xs\"> Thêm </a>",
					'href' => '',
					'state' => (object)array(
						'expanded' => TRUE
					),
					'nodes' => new \ArrayObject(array())
				)
			)
		);
		self::Tree_Traversal($this->uid, '', $tree[0]->nodes, function($data, $has_child, &$list) use ($curi) {
			$add = "$curi/$data->id/create";
			$edit = "$curi/$data->id/edit";
			$delete = "$curi/$data->id/delete";
			$exam = "/admin/category/$data->id/exam";
			$html = <<<EOF
			<a href="$exam">$data->name</a> <span class="text-muted"> ($data->child danh mục con, $data->n_exam đề thi, $data->n_share được chia sẻ) </span>
			<span class="pull-right">
				<a href="$add" class="btn btn-primary btn-xs"> Thêm </a>
				<a href="$edit" class="btn btn-primary btn-xs"> Sửa </a>
				<a href="$delete" class="btn btn-primary btn-xs be-care"> Xóa </a>
			</span>
EOF;
			$push = (object)array(
				'text' => $html
			);
			$list->append($push);
			if ($has_child)
			{
				$push->nodes = new \ArrayObject(array());
				$list = $push->nodes;
			}
		});
		return $tree;
	}
	public function insertCategory($data)
	{
		DB::query()->insert('category', $data)->execute();
		Misc::put_msg('success', "Đã thêm mới một danh mục");
	}
	public function updateCategory($data, $id)
	{
		if (DB::query()->update('category')->set($data)->where(array('id' => $id))->execute())
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
		$this->Tree_Traversal($this->uid, $id, $list_id, function($data, $has_child, $list){
			$list->append($data->id);
		});
		$r = 0;
		$list_id->exchangeArray(array_reverse($list_id->getArrayCopy()));
		DB::begin();
		foreach ($list_id as $id)
		{
			if (DB::query()->delete()->from('category')->where('id', $id)->execute())
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

?>