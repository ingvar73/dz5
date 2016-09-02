<?php

/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 02.09.2016
 * Time: 1:23
 */
class Model_User extends Model
{
	/**Возвращаем объект $user если он существует
	 * @param $login
	 * @return PDOStatement
	 */
	public static function getUserDataByLogin($login){
		$db = Db::getConnection();
		$query = "SELECT * FROM users WHERE login = :login LIMIT 0,1";
		$user = $db->prepare($query);
		$user->bindParam(':login', $login, PDO::PARAM_STR);
		$user->execute();
		return $user;
	}

	/** Проверка пароля из базы с введенным
	 * @param $login
	 * @param $password
	 * @return bool
	 */
	public static function checkPass($login, $password){
		$user = Users::getUserDataByLogin($login);
		$user = $user->fetch();
		$password == $user['password'] ? true : false;
	}

	/**Проверка на занятость пользователя
	 * @param $login
	 * @return bool
	 */
	public static function checkUsernameExist($login){
		$user = Users::getUserDataByLogin($login);
		$user->fetchColumn() ? true : false;
	}

	/** Проверка на корректность логина
	 * @param $login
	 * @return bool
	 */
	public static function checkUsernameRegistartion($login){
		((mb_strlen($login) >= 1) && (mb_strlen($login) <= 100)) ? true : false;
	}

	/** TRUE если пароль корректный
	 * @param $password
	 * @param $cpassword
	 * @return bool
	 */
	public static function checkPasswordRegistration($password, $cpassword){
		if((mb_strlen($password) >= 1) && (mb_strlen($password) <= 50)){
			($password == $cpassword) ? true : false;
		}
		return false;
	}

	public static function regUser($login, $password){
		$db = Db::getConnection();
		$query = "INSERT INTO users (login, password) VALUES (:login, :password)";
		$result = $db->prepare($query);

		$result = bindParam(':login', $login, PDO::PARAM_STR);
		$result = bindParam(':password', $password, PDO::PARAM_STR);
		return $result->execute();
	}

	/**Запоминаем сессию с ID пользователя
	 * @param $login
	 */
	public static function userAutorized($login){
		$user = Users::getUserDataByLogin($login)->fetch();
		$_SESSION['user'] = $user['id'];
	}

	/**Получаем путь до загруженного аватара
	 * @param $id
	 * @return bool|string
	 */
	public static function getAvatar($id){
		$db = Db::getConnection();
		$query = "SELECT avatar FROM users WHERE id = `$id` LIMIT 0,1";
		$avatar_id = $db->query($query);
		$avatar_id->setFetchMode(PDO::FETCH_ASSOC);
		$avatar_id = $avatar_id->fetch();
		$avatar_id = $avatar_id['avatar'];

		$sql = "SELECT file FROM photo WHERE id = `$avatar_id` LIMIT 0,1";
		$avatar_file = $db->query($query);
		$avatar_file->setFetchMode(PDO::FETCH_ASSOC);
		$avatar_file = $avatar_file->fetch();
		$avatar_file = $avatar_file['file'];

		if (isset($avatar_file)){
			$pathAvatar = "../uploads/".$avatar_file;
			echo $pathAvatar;
			return $pathAvatar;
		}
		return false;
	}

	// Возвращает массив со всеми файлами загруженными пользователей с указанным ID или false если файлов нет
	public static function getFilesListById($id)
	{
		$db = Db::getConnection();
		$sql = "SELECT file FROM photo WHERE user_id = '$id'";
		$files = $db->query($sql);
		$files->setFetchMode(PDO::FETCH_ASSOC);
		$files = $files->fetchAll();
		return $files;
	}

	public static function logOut(){
		unset($_SESSION['user']);
		session_destroy();
	}
}