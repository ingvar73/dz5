<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 31.08.2016
 * Time: 3:53
 */

include_once 'users.php';

class Model_Login extends Model
{
	private $login;
	private $name;
	private $age;
	private $about;
	private $password;
	private $cpassword;

	public $data;
	public function __construct()
	{
		$this->data = $_POST;
		$this->model = new Model($this->data);
	}
	public function get_data()
	{

	}

	public function db_connect()
	{

	}

	/**
	 * @return mixed
	 */
	public function getLogin()
	{
		$this->login = $_POST['login'];
		echo $this->login;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		$this->name = $_POST['name'];
		echo $this->name;
	}

	/**
	 * @return mixed
	 */
	public function getAge()
	{
		$this->age = $_POST['age'];
		echo $this->age;
	}

	/**
	 * @return mixed
	 */
	public function getAbout()
	{
		$this->about = $_POST['about'];
		echo $this->about;
	}

	/**
	 * @return mixed
	 */
	public function getPassword()
	{
		$this->password = $_POST['password'];
		echo $this->password;
	}

	public function getCpassword()
	{
		$this->cpassword = $_POST['cpassword'];
		echo $this->password;
	}
}