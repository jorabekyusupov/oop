<?php


class DB
{
    protected mysqli $connect;

    public function __construct($host = '127.0.0.1', $user = 'root', $pass = '', $db='oop')
    {
        $this->connect = new mysqli($host, $user, $pass, $db);
    }

    public function getConnect()
    {
        if (!$this->connect->connect_error) {
            return $this->connect;
        }
        return "Connection Error" . $this->connect->connect_error;
    }


}