<?php
//Front controller
//session_start();
// 1. Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);
define('ROOT',$_SERVER['DOCUMENT_ROOT']);

require_once 'app/load.php';
