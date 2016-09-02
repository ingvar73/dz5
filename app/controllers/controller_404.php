<?php
/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 30.08.2016
 * Time: 23:04
 */
class Controller_404 extends Controller
{
    public function action_index()
    {
		$this->view->generate('Ошибка - страница не существует', '404_view.php');
    }
}