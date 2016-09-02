<?php
/**
 * Created by PhpStorm.
 * User: admin-pc
 * Date: 30.08.2016
 * Time: 15:53
 */
class Routing
{
    static function execute(){
        $controllerName = 'Main';
        $actionName = 'index';
        $pieceOfUrl = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($pieceOfUrl[1])){
            $controllerName = $pieceOfUrl[1];
        }
        if (!empty($pieceOfUrl[2])){
            $actionName = $pieceOfUrl[2];
        }

        $modelName = 'Model_'.$controllerName;
        $controllerName = 'Controller_'.$controllerName;
        $actionName = 'action_'.$actionName;
        $fileWithModel = strtolower($modelName).'.php';
        $fileWithModelPath = "app/models/".$fileWithModel;

//        print_r($fileWithModelPath);

        if (file_exists($fileWithModelPath)){
            include $fileWithModelPath;
        }
        $fileWithController = strtolower($controllerName).'.php';
        $fileWithControllerPath = "app/controllers/".$fileWithController;

        if (file_exists($fileWithControllerPath)){
            include $fileWithControllerPath;
        } else {
            // Вывод ошибки
            //  404_view.php
            Routing::ErrorPage404();
//            echo "Ошибка 404";
        }

        $controller = new $controllerName;
        $action = $actionName;

        if (method_exists($controller, $action)){
//            call_user_func(array($controller, $actionName), $pieceOfUrl);
            $controller->$action();
        } else {
            // вывод ошибки
//            echo "Ошибка 404";
            Routing::ErrorPage404();
        }
    }

    static function ErrorPage404(){
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location:'.$host.'404');
    }
}