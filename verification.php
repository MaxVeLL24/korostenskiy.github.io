<?php
require_once 'autoloader.php';

class verification
{
    static public function VER($login, $password)
    {
        $db = new DB();
        return $db->login("SELECT `access` FROM `users` WHERE `login`='$login' AND `password`='$password'")->fetch_assoc();
    }
}