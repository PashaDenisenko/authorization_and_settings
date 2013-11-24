$(document).ready(function () {

    $('#reg').click(function () {
        if ($('#reg').text() == 'registration ↓') {
            $('#reg').text('registration ↑');
            $('#registration').animate({height: '300px'}, 1000);
        } else {
            $('#reg').text('registration ↓');
            $('#registration').animate({height: '0px'}, 1000);
        }
    });

    $('#auth').click(function () {
        if ($('#auth').text() == 'authorization ↓') {
            $('#auth').text('authorization ↑');
            $('#authorization').animate({height: '200px'}, 1000);
        } else {
            $('#auth').text('authorization ↓');
            $('#authorization').animate({height: '0px'}, 1000);
        }
    });

    $('#forgot').click(function () {
        if ($('#forgot').text() == 'forgot password ↓') {
            $('#forgot').text('forgot data ↑');
            $('#forgot_data').animate({height: '200px'}, 1000);
        } else {
            $('#forgot').text('forgot password ↓');
            $('#forgot_data').animate({height: '0px'}, 1000);
        }
    });

    $('#auth_send').click(function () {
        var name = $('#auth_name').val();
        var password = $('#auth_password').val();

        if (name == '' || name.length < 1) {
            var res = 'Field with the name cannot be blank';
        } else if (name.length > 30) {
            var res = 'You have exceeded the maximum permissible length of the name, it is equal to 30';
        } else if (password == '' || password.length < 1) {
            var res = 'Field with the password cannot be blank';
        } else if (password.length > 30) {
            var res = 'You have exceeded the maximum permissible length of the password, it is equal to 30';
        } else {
            var res = true;
        }

        if (res !== true) {
            $('#auth_error').text(res);
        } else {
//            пересылаем данные на php
            $.ajax({
                type: 'POST',
                url: 'lib/authorization.php',
                data: {'name': name, 'password': password},
                response: 'text',
                success: function (data) {
                    if (data == true) {
                        window.location.href = '../index.php';
                    } else {
                        $('#auth_error').text(data);
                    }
                },
                error: function () {
                    $('#auth_error').text('Problems connecting to the server');
                }
            })
        }
    });

    $('#reg_send').click(function () {
        var name = $('#reg_name').val();
        var password = $('#reg_password').val();
        var password_again = $('#reg_password_again').val();
        var email = $('#reg_email').val();

        if (name == '' || name.length < 1) {
            var res = 'Field with the name cannot be blank';
        } else if (name.length > 30) {
            var res = 'You have exceeded the maximum permissible length of the name, it is equal to 30';
        } else if (password == '' || password.length < 1) {
            var res = 'Field with the password cannot be blank';
        } else if (password.length > 30) {
            var res = 'You have exceeded the maximum permissible length of the password, it is equal to 30';
        } else if (password != password_again) {
            var res = 'Check passwords they do not match';
        } else if (email == '' || email.length < 1) {
            var res = 'Field with the email cannot be blank';
        } else if (email.length > 30) {
            var res = 'You have exceeded the maximum permissible length of the email, it is equal to 30';
        } else if (email.search(/^[a-z0-9_-]+@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/i) != 0) {
            var res = 'Incorrect format email';
        } else {
            var res = true;
        }

        if (res !== true) {
            $('#reg_error').text(res);
        } else {
            $.ajax({
                type: 'POST',
                url: 'lib/registration.php',
                data: {'name': name, 'password': password, 'password_again': password_again, 'email': email},
                response: 'text',
                success: function (data) {
                    $('#reg_error').text(data);
                },
                error: function () {
                    $('#reg_error').text('Problems connecting to the server');
                }
            })
        }

    });

    $('#forgot_send').click(function () {
        var name = $('#forgot_name').val();
        var email = $('#forgot_email').val();

        if (name == '' || name.length < 1) {
            var res = 'Field with the name cannot be blank';
        } else if (name.length > 30) {
            var res = 'You have exceeded the maximum permissible length of the name, it is equal to 30';
        } else if (email == '' || email.length < 1) {
            var res = 'Field with the email cannot be blank';
        } else if (email.length > 30) {
            var res = 'You have exceeded the maximum permissible length of the email, it is equal to 30';
        } else if (email.search(/^[a-z0-9_-]+@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/i) != 0) {
            var res = 'Incorrect format email';
        } else {
            var res = true;
        }

        if (res !== true) {
            $('#forgot_error').text(res);
        } else {
            $.ajax({
                type: 'POST',
                url: 'lib/forgot_password.php',
                data: {'name': name, 'email': email},
                response: 'text',
                success: function (data) {
                    $('#forgot_error').text(data);
                },
                error: function () {
                    $('#forgot_error').text('Problems connecting to the server');
                }
            })
        }

    });

});
