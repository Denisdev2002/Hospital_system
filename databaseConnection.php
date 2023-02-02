<?php

define("servername", "localhost");
define("username", "root");
define("password", "Honorio@123");
define("dbName", "Sistema_cadastro");

class Connection
{
    protected $conect;
    private $servername = servername;
    private $username = username;
    private $password = password;
    private $dbName = dbName;

    public function __construct()
    {
        $this->setConnection();
    }



    public function setConnection()
    {
        try {
            $this->conect = new PDO("mysql:host=$this->servername;dbName=$this->dbName", $this->username, $this->password);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $a) {
            echo "Falha ao conectar" . $a->getMessage();
            die();
        }
    }
}
