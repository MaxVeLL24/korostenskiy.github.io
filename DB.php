<?php

class DB
{
    public $link;
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'KorostenskiyOpenPit';

    public function __construct()
    {
        $this->link = new mysqli(self::DB_HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME);
    }

    public function find($sql)
    {
        return $query = $this->link->query($sql);
    }

    public function login($sql)
    {
        return $query = $this->link->query($sql);
    }

    public function operation($sql)
    {
        return $query = $this->link->query($sql);
    }
}

?>