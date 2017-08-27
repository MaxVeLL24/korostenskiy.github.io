<!doctype html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>"JSC Korostenskiy Open-pit"</title>
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
    <script src="js/uglify/loader.js"></script>
</head>
<body onload="myFunction()">
<div id="loader"></div>
<div class="main col-md-12">
    <div id="page" class="sub-main">
        <?php
        if (!$_COOKIE['ExpT']) {
            require 'wrong_way.php';
        } else if ($_COOKIE['ExpT'] == 'dpbvm') {
            require_once 'hdr.php';
            require_once 'work_background.php';
            require_once 'footer_author_add.php';
        } else {
            require 'wrong_way.php';
        }
        ?>
    </div>
</div>

<script src="js/uglify/script.js"></script>
</body>
</html>