<?php
require_once 'autoloader.php';

if (!empty($_POST['login']) and !empty($_POST['password'])) {
    $logres = verification::VER($_POST['login'], md5($_POST['password']));
    if (!empty($logres['access'])) {
        if ($logres['access'] == 'all') {
            $response[] = 'dhub.php';
            $response[] = '/';
            $response[] = 'dpbvm';
            echo $response[0];
            echo $response[1];
            echo $response[2];
        }
        if ($logres['access'] == 'details') {
            $response[] = 'shub.php';
            $response[] = '/';
            $response[] = 'opdet';
            echo $response[0];
            echo $response[1];
            echo $response[2];
        }
        if ($logres['access'] == 'pmm') {
            $response[] = 'shub.php';
            $response[] = '/';
            $response[] = 'pmm';
            echo $response[0];
            echo $response[1];
            echo $response[2];
        }
        if ($logres['access'] == 'railway ') {
            $response[] = 'shub.php';
            $response[] = '/';
            $response[] = 'rlwy';
            echo $response[0];
            echo $response[1];
            echo $response[2];
        }
        if ($logres['access'] == 'trade') {
            $response[] = 'shub.php';
            $response[] = '/';
            $response[] = 'trdner';
            echo $response[0];
            echo $response[1];
            echo $response[2];
        } else {
            return false;
        }
    }
    return false;
}