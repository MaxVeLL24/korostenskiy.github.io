<?php
require_once 'autoloader.php';
?>
<!doctype html>
<html lang="en">
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
</head>
<body>
<div class="main col-md-12">
    <div class="sub-main">
        <?php require_once 'header.php' ?>
        <?php

        if (!$_POST) {
            require_once 'work_background.php';
        } else if (!empty($_POST)) {
            $db = new DB();
            if (isset($_POST['detailsLogin']) && isset($_POST['detailsPassword'])) {
                $result = $db->login("SELECT * FROM `users` WHERE `login`='{$_POST['detailsLogin']}' AND `password`='{$_POST['detailsPassword']}'")->fetch_assoc();
                if ($result['access'] == 'all' or $result['access'] == 'details') {
                    require_once 'operations/details_op.php';
                } else {
                    require_once 'wrong_way.php';
                }
            } else if (isset($_POST['pmmLogin']) && isset($_POST['pmmPassword'])) {
                $result = $db->login("SELECT * FROM `users` WHERE `login`='{$_POST['pmmLogin']}' AND `password`='{$_POST['pmmPassword']}'")->fetch_assoc();
                if ($result['access'] == 'all' or $result['access'] == 'pmm') {
                    echo '<h1 style="color: white;text-align: center">Welcome to PMM</h1>';
                } else {
                    require_once 'wrong_way.php';
                }

            } else if (isset($_POST['fuelLogin']) && isset($_POST['fuelPassword'])) {
                $result = $db->login("SELECT * FROM `users` WHERE `login`='{$_POST['fuelLogin']}' AND `password`='{$_POST['fuelPassword']}'")->fetch_assoc();
                if ($result['access'] == 'all' or $result['access'] == 'fuel') {
                    echo '<h1 style="color: white;text-align: center">Welcome to fuel</h1>';
                } else {
                    require_once 'wrong_way.php';
                }

            } else if (isset($_POST['balanceLogin']) && isset($_POST['balancePassword'])) {
                $result = $db->login("SELECT * FROM `users` WHERE `login`='{$_POST['balanceLogin']}' AND `password`='{$_POST['balancePassword']}'")->fetch_assoc();
                if ($result['access'] == 'all') {
                    require_once 'operations/balance.php';
                } else {
                    require_once 'wrong_way.php';
                }
            }

        } else {
            require_once 'login_error.php';
        }

        ?>
        <?php require_once 'footer.php' ?>
    </div>
</div>


<script src="js/script.js"></script>
</body>
</html>
