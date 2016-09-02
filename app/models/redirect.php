<?php

/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 02.09.2016
 * Time: 16:37
 */
class Redirect
{
	public static function redirectToPage($way)
	{
		$host  = $_SERVER['HTTP_HOST'];
		$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = $way;
		header("Location: http://$host$uri/$extra");
		exit;
	}
}