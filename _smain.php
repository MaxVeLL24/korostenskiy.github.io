<?php
require_once 'autoloader.php';
var_dump($_POST);
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
        <?php
        if ($_COOKIE['ExpT']=='dpbvm') {
            echo "<script>
    setTimeout('location.replace(\"dhub.php\")', 0);
</script>";
        }
        if (!$_COOKIE['ExpT']) {
            require 'wrong_way.php';
        } else {
            $headlogo = '<div class="logo">
            <span class="glyphicon glyphicon-eye-open visio" aria-hidden="true"></span> <span
                    class="logo-text">База витратних матеріалів <br>
            <span class="pat">"ПАТ Коростенський кар' . "'" . 'єр"</span></span>
            <a href="shub.php">
                <div class="logo-img"><img src="img/logo.png" alt="Коростень_лого"></div>
            </a>
        </div>';
            echo $headlogo;
            date_default_timezone_set('Europe/Kiev');
            if (!$_POST) {
                require_once 'work_background.php';
            } else if (!empty($_POST)) {
                $db = new DB();
                if (isset($_POST['detailId'])) {
                    if ($_POST['Give']) {
                        $operation = $db->operation("INSERT INTO `DetailsAccounting`(`detail_id`, `operation`, `count`, `taker`, `giver`, `operation_time`) VALUES ('{$_POST['detailId']}','{$_POST['Give']}','{$_POST['DetailsCount']}','{$_POST['taker']}','{$_POST['giver']}',CURRENT_TIMESTAMP)");
                        $balanceCheck = $db->find("SELECT `countOnBalance` FROM `DetailsBalance` WHERE `detail_id`='{$_POST['detailId']}'")->fetch_assoc();
                        $balanceChange = $balanceCheck['countOnBalance'] - $_POST['DetailsCount'];
                        $balanceUpdate = $db->operation("UPDATE `DetailsBalance` SET `countOnBalance`='$balanceChange',`LastUpdateTime`=CURRENT_TIMESTAMP WHERE `detail_id`='{$_POST['detailId']}'");
                        if (!$balanceUpdate === false) {
                            require_once 'operations/operation_success.php';
                            echo "<script>
    setTimeout('location.replace(\"shub.php\")', 7000);
</script>";
                        } else if ($balanceUpdate === false) {
                            require_once 'operations/operation_error.php';
                            echo "<script>
    setTimeout('location.replace(\"shub.php\")', 7000);
</script>";
                        }
                    }
                    if ($_POST['Take']) {
                        $operation = $db->operation("INSERT INTO `DetailsAccounting`(`detail_id`, `operation`, `count`, `taker`, `giver`, `operation_time`) VALUES ('{$_POST['detailId']}','{$_POST['Take']}','{$_POST['DetailsCount']}','{$_POST['taker']}','{$_POST['giver']}',CURRENT_TIMESTAMP)");
                        $balanceCheck = $db->find("SELECT `countOnBalance` FROM `DetailsBalance` WHERE `detail_id`='{$_POST['detailId']}'")->fetch_assoc();
                        $balanceChange = $balanceCheck['countOnBalance'] + $_POST['DetailsCount'];
                        $balanceUpdate = $db->operation("UPDATE `DetailsBalance` SET `countOnBalance`='$balanceChange',`LastUpdateTime`=CURRENT_TIMESTAMP WHERE `detail_id`='{$_POST['detailId']}'");
                        if (!$balanceUpdate === false) {
                            require_once 'operations/operation_success.php';
                            echo "<script>
    setTimeout('location.replace(\"shub.php\")', 7000);
</script>";
                        } else if ($balanceUpdate === false) {
                            require_once 'operations/operation_error.php';
                            echo "<script>
    setTimeout('location.replace(\"shub.php\")', 7000);
</script>";
                        }
                    }
                }
                if (isset($_POST['pmmId'])) {
                    if ($_POST['Give']) {
                        $operation = $db->operation("INSERT INTO `pmmAccounting`(`pmm_id`, `operation`, `count`, `taker`, `giver`, `operationTime`) VALUES ('{$_POST['pmmId']}','{$_POST['Give']}','{$_POST['pmmCount']}','{$_POST['taker']}','{$_POST['giver']}',CURRENT_TIMESTAMP)");
                        $balanceCheck = $db->find("SELECT `countOnBalance` FROM `pmmBalance` WHERE `pmm_id`='{$_POST['pmmId']}'")->fetch_assoc();
                        $balanceChange = $balanceCheck['countOnBalance'] - $_POST['pmmCount'];
                        $balanceUpdate = $db->operation("UPDATE `pmmBalance` SET `countOnBalance`='$balanceChange',`LastUpdateTime`=CURRENT_TIMESTAMP WHERE `pmm_id`='{$_POST['pmmId']}'");
                        if (!$balanceUpdate === false) {
                            require_once 'operations/operation_success.php';
                            echo "<script>
    setTimeout('location.replace(\"shub.php\")', 7000);
</script>";
                        } else if ($balanceUpdate === false) {
                            require_once 'operations/operation_error.php';
                            echo "<script>
    setTimeout('location.replace(\"shub.php\")', 7000);
</script>";
                        }
                    }
                    if ($_POST['Take']) {
                        $operation = $db->operation("INSERT INTO `pmmAccounting`(`pmm_id`, `operation`, `count`, `taker`, `giver`, `operationTime`) VALUES ('{$_POST['pmmId']}','{$_POST['Take']}','{$_POST['pmmCount']}','{$_POST['taker']}','{$_POST['giver']}',CURRENT_TIMESTAMP)");
                        $balanceCheck = $db->find("SELECT `countOnBalance` FROM `pmmBalance` WHERE `pmm_id`='{$_POST['pmmId']}'")->fetch_assoc();
                        $balanceChange = $balanceCheck['countOnBalance'] + $_POST['pmmCount'];
                        $balanceUpdate = $db->operation("UPDATE `pmmBalance` SET `countOnBalance`='$balanceChange',`LastUpdateTime`=CURRENT_TIMESTAMP WHERE `pmm_id`='{$_POST['pmmId']}'");
                        if (!$balanceUpdate === false) {
                            require_once 'operations/operation_success.php';
                            echo "<script>
    setTimeout('location.replace(\"shub.php\")', 7000);
</script>";
                        } else if ($balanceUpdate === false) {
                            require_once 'operations/operation_error.php';
                            echo "<script>
    setTimeout('location.replace(\"shub.php\")', 7000);
</script>";

                        }
                    }
                }
                if (isset($_POST['railways_operator_id'])) {
                    $operation = $db->operation("INSERT INTO `railwayAccounting`(`operator_id`, `railways_count`, `operation_time`) VALUES ('{$_POST['railways_operator_id']}','{$_POST['rlwCount']}',CURRENT_TIMESTAMP)");

                    $balanceCheck = $db->find("SELECT `month_railway_count` FROM `railways_balance` WHERE `operator_id`='{$_POST['railways_operator_id']}'")->fetch_assoc();
                    $balanceChange = $balanceCheck['month_railway_count'] + $_POST['rlwCount'];
                    $balanceUpdate = $db->operation("UPDATE `railways_balance` SET `month_railway_count`='$balanceChange',`LastUpdateTime`=CURRENT_TIMESTAMP WHERE `operator_id`='{$_POST['railways_operator_id']}'");

                    if (!$balanceUpdate === false) {
                        require_once 'operations/operation_success.php';
                        echo "<script>
    setTimeout('location.replace(\"shub.php\")', 7000);
</script>";
                    } else if ($balanceUpdate === false) {
                        require_once 'operations/operation_error.php';
                        echo "<script>
    setTimeout('location.replace(\"shub.php\")', 7000);
</script>";
                    }
                }


                if (isset($_POST['nakladna']) && isset($_POST['car_number'])) {

//                    $operation = $db->operation("INSERT INTO `railwayAccounting`(`operator_id`, `railways_count`, `operation_time`) VALUES ('{$_POST['railways_operator_id']}','{$_POST['rlwCount']}',CURRENT_TIMESTAMP)");
//
//                    $balanceCheck = $db->find("SELECT `month_railway_count` FROM `railways_balance` WHERE `operator_id`='{$_POST['railways_operator_id']}'")->fetch_assoc();
//                    $balanceChange = $balanceCheck['month_railway_count'] + $_POST['rlwCount'];
//                    $balanceUpdate = $db->operation("UPDATE `railways_balance` SET `month_railway_count`='$balanceChange',`LastUpdateTime`=CURRENT_TIMESTAMP WHERE `operator_id`='{$_POST['railways_operator_id']}'");
//
//                    if (!$balanceUpdate === false) {
//                        require_once 'operations/operation_success.php';
//                        echo "<script>
//    setTimeout('location.replace(\"shub.php\")', 7000);
//</script>";
//                    } else if ($balanceUpdate === false) {
//                        require_once 'operations/operation_error.php';
//                        echo "<script>
//    setTimeout('location.replace(\"shub.php\")', 7000);
//</script>";
//                    }
                }

                if (isset($_POST['chose'])) {
                    if ($_POST['chose'] == 'details') {
                        require_once 'operations/details_op.php';
                    }
                    if ($_POST['chose'] == 'pmm') {
                        require_once 'operations/pmm_operations.php';
                    }
                    if ($_POST['chose'] == 'balance') {
                        require_once 'operations/balance.php';
                    }
                    if ($_POST['chose'] == '') {
                        require_once 'wrong_way.php';
                    }
                }
            } else {
                require_once 'login_error.php';
            }
            require_once 'footer_author_add.php';
        }
        ?>
    </div>
</div>


<script src="js/script.js"></script>
<script src="js/ajax_balance.js"></script>
</body>
</html>
