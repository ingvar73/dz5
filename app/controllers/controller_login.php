<?php

/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 30.08.2016
 * Time: 23:47
 */

include_once ('app/models/model_user.php');
include_once ('app/models/redirect.php');


class Controller_Login extends Controller
{
//	public function __construct()
//	{
//		$this->model = new Model_Login();
//		$this->view = new View();
//	}

	public function actionRegistration()
	{
		$login = '';
		$password = '';
		$confirm_password = '';
		$result = '';
		if (isset($_POST['login'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			$errors = false;
			if (!Users::checkUsernameRegistartion($login)) {
				$errors[] = 'Username введен неверно, он должен быть длиной от 1 до 100 символов';
			}
			if (!Users::checkPasswordRegistration($password, $cpassword)) {
				$errors[] = 'Пароль введен неверно, он должен быть длиной от 1 до 50 символов, а так же пароли должны совпадать';
			}
			if (Users::checkUsernameExist($login)) {
				$errors [] = 'Такой пользователь уже существует, выберите другой никнейм';
			}
			if ($errors == false) {
				// Сохраняем пользователя в базе данных
				$result = Users::regUser($login, $password);
			}
		}
		require_once(ROOT . '/views/reg_view.php');
		return true;
	}

	public function action_index()
    {
    	if (isset($_SESSION['user'])){
			Redirect::redirectToPage('registration/');
		}
//    	$data = $this->model->get_data();
		$this->view->generate('login_view.php', 'template_view.php');
    }

	public function actionFiles()
	{
		$count_files = 0;
		$avatar = null;
		$files = [];
		if (isset($_SESSION['user'])) {
			$files = Users::getFilesListById($_SESSION['user']);
			$count_files = count($files);
			$avatar = Users::getAvatar($_SESSION['user']);
			$this->view->generate('user_view.php', 'template_view.php');
		} else {
			$this->view->generate('index_view.php', 'template_view.php');
		}
		return true;
	}

	// Авторизация и регистрация в системе
	public function actionAuthorization()
	{
		$login = '';
		$password = '';
		$name = false;
		if (isset($_POST['login'])) {
			$login = $_POST['login'];
			$password = $_POST['password'];
			$errors = false;
			if (!Users::checkUsernameExist($login)) {
				$errors [] = 'Такого пользователя не существует, проверьте правильность данных';
			}
			if (!Users::checkPasswordRegistration($login, $password)) {
				$errors[] = 'Введенный пароль не подходит, проверьте правильность данных';
			}
			if ($errors == false) {
				// Логиним пользователя
				Users::userAutorized($login);
				// Перенаправляем на страницу просмотра страницы пользователя сайта
				$this->view->generate('user_view.php', 'template_view.php');
			}
		}
		if (isset($_POST['Logout'])) {
			Users::logOut();
		}
		$this->view->generate('index_view.php', 'template_view.php');
		return true;
	}
}