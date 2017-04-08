<?php

namespace System\Libraries;

class Pagination
{
	private $total = 1;
	private $page_size = 10;
	private $current_page = 1;
	private $show_page = 5;
	private $last_page = NULL;
	public function __construct($total, $page_size, $current_page)
	{
		$this->total = $total;
		$this->page_size = $page_size;
		$this->current_page = $current_page;
	}
	public function set_total($n)
	{
		$this->total = $n;
		return $this;
	}
	public function set_pagesize($n)
	{
		$this->page_size = $n;
		return $this;
	}
	public function set_page($n)
	{
		$this->current_page = $n;
		return $this;
	}
	public function show_page($n)
	{
		$this->show_page = $n;
	}
	private function p_link($page)
	{
		if ($page < 1 or $page > $this->last_page or $page == $this->current_page)
		{
			return 'javascript:void(0)';
		}
		return Request::build_get($_GET, array('page' => $page));
	}
	public function get()
	{
		$html = '<ul class="pagination">';
		$this->last_page = ceil($this->total / $this->page_size);
		if (!$this->last_page) $this->last_page = 1;
		if ($this->current_page > $this->last_page)
		{
			throw new Exception\Pagination_InvalidPageNumber('Pager error !');
		}
		$show_left = $this->current_page - intval($this->show_page / 2);
		if ($show_left < 1)
		{
			$show_left = 1;
		}
		$show_right = $this->current_page + intval($this->show_page / 2);
		if ($show_right > $this->last_page)
		{
			$show_right = $this->last_page;
		}
		$link = (object)array(
			'first' => $this->p_link(1),
			'next' => $this->p_link($this->current_page + 1),
			'prev' => $this->p_link($this->current_page - 1),
			'last' => $this->p_link($this->last_page),
		);
		$html .= "<li><a href=\"$link->first\" title=\"First\"><span class=\"glyphicon glyphicon-fast-backward\"></span> </a></li>"; // first
		$html .= "<li><a href=\"$link->prev\" title=\"Previous\"><span class=\"glyphicon glyphicon-chevron-left\"></span></a></li>"; // prev
		for ($i = $show_left; $i <= $show_right; $i++)
		{
			$active = $i == $this->current_page ? ' class="active"' : '';
			$addr = $this->p_link($i);
			$html .= "<li$active><a href=\"$addr\"> $i </a></li>";
		}
		$html .= "<li><a href=\"$link->next\" title=\"Next\"><span class=\"glyphicon glyphicon-chevron-right\"></span></a></li>"; // next
		$html .= "<li><a href=\"$link->last\" title=\"Last\"><span class=\"glyphicon glyphicon-fast-forward\"></span></a></li>"; // last
		$html .= '</ul>';
		return $html;
	}
}
