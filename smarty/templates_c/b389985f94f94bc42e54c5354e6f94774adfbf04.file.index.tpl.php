<?php /* Smarty version Smarty-3.1.15, created on 2013-11-19 14:47:35
         compiled from "smarty\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15115528769c32d96a7-72331902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b389985f94f94bc42e54c5354e6f94774adfbf04' => 
    array (
      0 => 'smarty\\templates\\index.tpl',
      1 => 1384868635,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15115528769c32d96a7-72331902',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_528769c332b739_35974416',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528769c332b739_35974416')) {function content_528769c332b739_35974416($_smarty_tpl) {?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acceptic-test-work</title>
    <link rel="stylesheet" href="style/main.css">
    <script src="js/jquery-2.0.3.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
<div id="wrapper">
    <button id="auth">authorization ↓</button>
    <div id="authorization">
        <input type="name" placeholder="name" id="auth_name">
        <input type="password" placeholder="password" id="auth_password">
        <button id="auth_send">Authorization</button>
        <h3 id="auth_error"></h3>
    </div>
    <button id="reg">registration ↓</button>
    <div id="registration">
        <input type="name" placeholder="name" id="reg_name">
        <input type="password" placeholder="password" id="reg_password">
        <input type="password" placeholder="password again" id="reg_password_again">
        <input type="text" placeholder="email" id="reg_email">
        <button id="reg_send">Registration</button>
        <h3 id="reg_error"></h3>
    </div>
    <button id="forgot">forgot password ↓</button>
    <div id="forgot_data">
        <input type="text" placeholder="name" id="forgot_name">
        <input type="text" placeholder="email" id="forgot_email">
        <button id="forgot_send">Send</button>
        <h3 id="forgot_error"></h3>
    </div>
</div>
</body>
</html><?php }} ?>
