<?php

namespace Models\Acess\Login;

require_once('../Lib/DatabaseConnection.php');

use Connection;

class Login extends Connection
{
    private $sql;

    public function __construct()
    {
        parent::__construct();
    }

    public function SQL()
    {
        $query = ("SELECT Email, SPassword FROM Sistema_cadastro.Cadastro");
        $this->sql = $this->conect->query;
        return $this->sql;
    }
    public function verificarUsuario()
    {
        if ($this->sql->rowCount() != 0) {
            session_start();
            $_SESSION['user'] = $this->sql['Email'];
            return $_SESSION['user'];
        } else {
            require_once('../Models/Error.php');
            return $_SESSION['errorUser'];
        }
    }
}
