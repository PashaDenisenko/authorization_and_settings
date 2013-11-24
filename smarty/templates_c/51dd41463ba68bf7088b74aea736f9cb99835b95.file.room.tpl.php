<?php /* Smarty version Smarty-3.1.15, created on 2013-11-19 14:48:20
         compiled from "smarty\templates\room.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30725528a2db50e3529-13213944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51dd41463ba68bf7088b74aea736f9cb99835b95' => 
    array (
      0 => 'smarty\\templates\\room.tpl',
      1 => 1384868635,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30725528a2db50e3529-13213944',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_528a2db518b4c1_08726475',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528a2db518b4c1_08726475')) {function content_528a2db518b4c1_08726475($_smarty_tpl) {?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acceptic-test-work</title>
    <link rel="stylesheet" href="style/main.css">
    <script src="js/jquery-2.0.3.min.js"></script>
    <script src="js/change.js"></script>
</head>
<body>
<div id="wrapper">
    <div id="change">
        <input type="name" placeholder="name" id="name">
        <button id="change_name" class="button">Change name</button>
        <hr>
        <input type="password" placeholder="old_password" id="old_password"><br>
        <input type="password" placeholder="new password" id="password">
        <button id="change_password" class="button">Change password</button>
        <input type="password" placeholder="new password again" id="password_again"><br>
        <hr>
        <input type="text" placeholder="email" id="email">
        <button id="change_email" class="button">Change email</button>
        <hr>
        <h3 id="change_error"></h3>
        <a href="lib/logout.php" id="exit">Exit</a>
    </div>
</div>
</body>
</html><?php }} ?>
