<?php

/**
 * Created by PhpStorm.
 * User: ingvar73
 * Date: 31.08.2016
 * Time: 2:36
 */
class Controller_Index extends Controller
{
	public function action_index()
	{
//		parent::action_index(); // TODO: Change the autogenerated stub
		$this->view->generate('Главная', 'index.php');
	}
}