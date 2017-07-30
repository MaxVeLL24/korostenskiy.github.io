<?php
require_once 'autoloader.php';
?>
<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>"JSC Korostenskiy Open-pit"</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Jura" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <style>
        body {
            background: url("img/footer_lodyas.png");
            background-size: cover;
        }
    </style>
</head>
<body>
<div class="login-container">
    <div class="logo">
        <span class="glyphicon glyphicon-eye-open visio" aria-hidden="true"></span> <span
                class="logo-text">База витратних матеріалів <br>
            <span class="pat">"ПАТ Коростенський кар'єр"</span></span>
        <a>
            <div class="logo-img"><img src="img/logo.png" alt="Коростень_лого"></div>
        </a>
    </div>
    <br>
    <div class="login-form">
        <form action="">
            <div class="input-group">
                <span class="top-error">Логін або пароль</span> <span class="right-error">введено невірно</span>
                <br>
                <input name="login" type="text" class="form-control" placeholder="Логін"
                       aria-describedby="basic-addon1" required>
            </div>
            <div class="input-group">
                <input name="password" type="password" class="form-control" placeholder="Пароль"
                       aria-describedby="basic-addon1" required>
            </div>
            <a type="submit" class="login-start">Вхід</a>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('div.input-group').click(function (e) {
            if ($(e.target).is('input')) {
                $(this).children().removeClass('empty');
            }
        });
        $('a.login-start').click(function () {
                var login = $('input[name=login]').val();
                var password = $('input[name=password]').val();
                if (login !== '' && password !== '') {
                    $.ajax({
                        url: "verajax.php",
                        type: "post",
                        data: {
                            'login': login,
                            'password': password
                        },
                        success: function (response) {
                            if (response) {
                                var newres = response.split('/');
                                var now = new Date();
                                var time = now.getTime();
                                time += (15 * 60 * 1000);
                                now.setTime(time);
                                document.cookie =
                                    'ExpT=' + newres[1] +
                                    '; expires=' + now.toUTCString();
                                document.location.href = newres[0];
                            }
                            else {
                                $('input[name=login]').addClass('empty');
                                $('input[name=password]').addClass('empty');
                                $('div.input-group span').addClass('empty');
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                }
            }
        );
    });
</script>
</body>
</html>