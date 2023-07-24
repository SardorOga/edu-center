<?php


namespace vendor\myframe;


use PDO;

class ConnectDB
{
    private $conn;
    private $localhost = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'academy';

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=$this->localhost;dbname=$this->database",$this->username,$this->password ,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    public function getConnection()
    {
        return $this->conn;
    }
}