<!doctype html>
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
</html>