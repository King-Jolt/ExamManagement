<?php

namespace Application\Model;

use System\Libraries\Session;

class Misc
{
	public static function get_uid()
	{
		static $i = 1;
		static $m = 'Current microtime';
		if (($new_m = microtime(TRUE)) != $m)
		{
			$m = $new_m;
			$i = 1;
		}
		else
		{
			if ($i == 0xff)
			{
				while (($new_m = microtime(TRUE)) == $m);
				$m = $new_m;
				$i = 0;
			}
			$i++;
		}
		return sprintf("%8x%05x%02x", floor($m), ($m-floor($m)) * 1000000, $i);
	}
	public static function alert($type, $msg, $auto_close)
	{
		$title = ucfirst($type);
		$classes = "alert alert-$type ";
		if ($auto_close) $classes .= 'auto-close-msg';
		return <<<EOF
		<div class="$classes">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<div class="inner-msg">
				<strong> $title ! </strong> $msg
			</div>
		</div>
EOF;
	}
	public static function put_msg($type, $msg, $auto_close = TRUE)
	{
		Session::set('message', array(
			'type' => $type,
			'str' => $msg,
			'close' => $auto_close
		));
	}
	public static function get_msg()
	{
		$msg = Session::get('message');
		Session::remove('message');
		return $msg ? self::alert($msg['type'], $msg['str'], $msg['close']) : $msg;
	}
}

?>