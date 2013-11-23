<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require_once 'smarty/libs/Smarty.class.php';
require_once "lib/user_class.php";
$smarty = new Smarty();
$user = User::getObject();
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';

if ($user->isAuth()) {
    $smarty->display('room.tpl');
} else {
    $smarty->display('index.tpl'); //выводим шаблон на экран, он находиться в smarty/templates/*.tpl
}


