$(document).ready(function () {
    $('#change_name').click(function () {
        var name = $('#name').val();
        if (name == '' || name.length < 1) {
            var res = 'Field with the name cannot be blank';
        } else if (name.length > 30) {
            var res = 'You have exceeded the maximum permissible length of the name, it is equal to 30';
        } else {
            var res = true;
        }
        if (res !== true) {
            $('#change_error').text(res);
        } else {
            $.ajax({
                type: 'POST',
                url: 'lib/change.php',
                data: {'name': name},
                response: 'text',
                success: function (data) {
                    $('#change_error').text(data);
                },
                error: function () {
                    $('#change_error').text('Problems connecting to the server');
                }
            })
        }
    });

    $('#change_password').click(function () {
        var old_password = $('#old_password').val();
        var password = $('#password').val();
        var password_again = $('#password_again').val();

        if (old_password == '' || old_password.length < 1) {
            var res = 'Field with the old password cannot be blank';
        } else if (old_password.length > 30) {
            var res = 'You have exceeded the maximum permissible length of the old password, it is equal to 30';
        } else if (password == '' || password.length < 1) {
            var res = 'Field with the password cannot be blank';
        } else if (password.length > 30) {
            var res = 'You have exceeded the maximum permissible length of the password, it is equal to 30';
        } else if (password != password_again) {
            var res = 'Check passwords they do not match';
        } else {
            var res = true;
        }
        if (res !== true) {
            $('#change_error').text(res);
        } else {
            $.ajax({
                type: 'POST',
                url: 'lib/change.php',
                data: {'old_password': old_password, 'password': password},
                response: 'text',
                success: function (data) {
                    $('#change_error').text(data);
                },
                error: function () {
                    $('#change_error').text('Problems connecting to the server');
                }
            })
        }
    })

    $('#change_email').click(function () {
        var email = $('#email').val();
        if (email == '' || email.length < 1) {
            var res = 'Field with the name cannot be blank';
        } else if (email.length > 30) {
            var res = 'You have exceeded the maximum permissible length of the name, it is equal to 30';
        } else if (email.search(/^[a-z0-9_-]+@[a-z0-9-]+\.([a-z]{1,6}\.)?[a-z]{2,6}$/i) != 0) {
            var res = 'Incorrect format email';
        } else {
            var res = true;
        }
        if (res !== true) {
            $('#change_error').text(res);
        } else {
            $.ajax({
                type: 'POST',
                url: 'lib/change.php',
                data: {'email': email},
                response: 'text',
                success: function (data) {
                    $('#change_error').text(data);
                },
                error: function () {
                    $('#change_error').text('Problems connecting to the server');
                }
            })
        }
    })
});

