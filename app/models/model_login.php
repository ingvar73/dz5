<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 31.08.2016
 * Time: 3:53
 */

class Model_Login extends Model
{
	public $login;
	public $name;
	public $age;
	public $about;
	public $password;
	public $cpassword;

	public function get_data()
	{
		parent::get_data(); // TODO: Change the autogenerated stub

	}

	public function db_connect()
	{

	}
}