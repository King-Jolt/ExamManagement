<?php

namespace System\Database;

use System\Libraries\Misc;
use System\Database\DB_Query;
use System\Database\DB_Exception;

class DB
{
	public static $auto_open_connect = TRUE;
	private static $instance = NULL;
	public static $db_driver = 'read from config file';
	private $connect = NULL;
	private function __construct()
	{
		$db = Misc::get_config('db');
		self::$db_driver = $db['driver'];
		$this->connect = new PDO\Sql($db);
	}
	public static function open()
	{
		if (self::$instance instanceof self)
		{
			return FALSE;
		}
		self::$instance = new self();
	}
	public static function begin()
	{
		return DB::get_connect()->begin();
	}
	public static function commit()
	{
		return DB::get_connect()->commit();
	}
	public static function rollback()
	{
		return DB::get_connect()->rollback();
	}
	public static function query($query = '', $param = NULL)
	{
		return new DB_Query($query, $param);
	}
	public static function get($table)
	{
		return self::query()->select()->from($table)->execute();
	}
	public static function close()
	{
		if (method_exists(self::$instance->connect, 'close'))
		{
			$r = self::$instance->connect->close();
			self::$instance = NULL;
		}
		return FALSE;
	}
	public static function get_connect()
	{
		if (self::$auto_open_connect)
		{
			DB::open();
		}
		if (self::$instance instanceof self)
		{
			return self::$instance->connect;
		}
		throw new DB_Exception('Please call ' . __CLASS__ . '::open() : to open connect database.');
	}
}

?>