<?php
require_once 'autoloader.php';

?>
<!doctype html>
<html lang="ua">
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
    <style>
        body {
            background: url("img/footer_lodyas.png");
            background-size: cover;
        }
    </style>
    <script src="js/loader.js"></script>
</head>
<body onload="myFunction()">
<div id="loader"></div>
<div class="main col-md-12">
    <div id="page" class="sub-main">
        <?php
        $headlogo = '<div class="logo">
            <span class="glyphicon glyphicon-eye-open visio" aria-hidden="true"></span> <span
                    class="logo-text">База витратних матеріалів <br>
            <span class="pat">"ПАТ Коростенський кар' . "'" . 'єр"</span></span>
            <a href="shub.php">
                <div class="logo-img"><img src="img/logo.png" alt="Коростень_лого"></div>
            </a>
        </div>';
        ?>
        <?php
        if (!$_COOKIE['ExpT']) {
            require_once 'wrong_way.php';
        }
        if (isset($_COOKIE['ExpT'])) {
            if ($_COOKIE['ExpT'] == 'opdet') {
                echo $headlogo;
                require_once 'operations/details_op.php';
            }
            if ($_COOKIE['ExpT'] == 'pmm') {
                echo $headlogo;
                require_once 'operations/pmm_operations.php';
            }
            if ($_COOKIE['ExpT'] == 'rlwy') {
                echo $headlogo;
                require_once 'operations/railway.php';
            }
            if ($_COOKIE['ExpT'] == 'trdner') {
                echo $headlogo;
                require_once 'operations/local_trade.php';
            }
        } else {
            require_once 'wrong_way.php';
        }
        ?>
    </div>
</div>
<script src="js/script.js"></script>
</body>
</html>