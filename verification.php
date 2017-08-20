<?php
require_once 'autoloader.php';

class verification
{
    static public function VER($login, $password)
    {
        $db = new DB();
        return $db->login("SELECT `access` FROM `users` WHERE `login`='$login' AND `password`='$password'")->fetch_assoc();
    }

    static public function DETPROD($detailID)
    {
        $db = new DB();
        return $db->login("SELECT * FROM `DetailsAccounting` WHERE `detail_id`='$detailID' ORDER BY `operation_time` DESC")->fetch_all();
    }

    static public function PMMPROD($pmmID)
    {
        $db = new DB();
        return $db->login("SELECT * FROM `pmmAccounting` WHERE `pmm_id`='$pmmID' ORDER BY `operationTime` DESC")->fetch_all();
    }
    static public function pmmWITHtime($pmmID,$time)
    {
        $db = new DB();
        return $db->login("SELECT * FROM `pmmAccounting` WHERE `pmm_id`='$pmmID' ORDER BY `operationTime` DESC")->fetch_all();
    }
}