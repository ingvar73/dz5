<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 31.08.2016
 * Time: 3:53
 */

include_once 'model_user.php';

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
		return $this->login;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		$this->name = $_POST['name'];
		return $this->name;
	}

	/**
	 * @return mixed
	 */
	public function getAge()
	{
		$this->age = $_POST['age'];
		return $this->age;
	}

	/**
	 * @return mixed
	 */
	public function getAbout()
	{
		$this->about = $_POST['about'];
		return $this->about;
	}

	/**
	 * @return mixed
	 */
	public function getPassword()
	{
		$this->password = $_POST['password'];
		return $this->password;
	}

	public function getCpassword()
	{
		$this->cpassword = $_POST['cpassword'];
		return $this->password;
	}
}