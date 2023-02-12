<?php

namespace Models\Acess\Login;

require_once('../Lib/DatabaseConnection.php');

use Connection;

class Login extends Connection
{
    private $email;
    private $password;
    private $sql;
    protected $rowCount;

    public function __construct()
    {
        parent::__construct();
    }
    public function getEmail(): mixed
    {
        $this->email = $_POST['email'];
        $this->limpaPost($this->email);
        return $this->email;
    }
    public function getPassword(): mixed
    {
        $this->password = $_POST['password'];
        $this->limpaPost($this->password);
        return $this->password;
    }
    public function limpaPost($post)
    {
        $post = trim($post);
        $post = stripslashes($post);
        $post = htmlspecialchars($post);
        return $post;
    }
    public function SQL()
    {
        $query = ("SELECT Email, SPassword FROM Sistema_cadastro.Cadastro where Email = '{$this->getEmail()}','{$this->getPassword()}'");
        $sql = $this->conect->query($query);
        return $sql;
    }
    public function getRowCount()
    {
        $this->rowCount = $this->sql->rowCount();
        return $this->rowCount;
    }
    public function verificarUsuario()
    {
        if ($this->getRowCount() >= 0) {
            return true;
        } else {
            return false;
        }
    }
}
