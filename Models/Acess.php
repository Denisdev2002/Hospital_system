<?php

namespace Models\Acess\Login;

require_once('../Lib/DatabaseConnection.php');

use Connection;
use PDO;

class Login extends Connection
{
    private $user;
    private $password;
    protected $sql;
    protected $query;
    protected $count;



    public function __construct()
    {
        parent::__construct();
    }
    public function getUser()
    {
        $this->user = $_POST['user'];
        $this->limpaPost($this->user);
        return $this->user;
    }
    public function getPassword()
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
    public function Sql()
    {
        $query = ("SELECT * FROM Sistema_cadastro.Cadastro where Email = '{$this->getUser()}' AND SPassword = '{$this->getPassword()}'");
        $this->sql = $this->conect->prepare($query);
        $this->sql->execute();
    }

    public function connect()
    {
        if ($this->sql->rowCount() > 0) {
            $data = $this->sql->fetch(PDO::FETCH_ASSOC);
            var_dump($data);
            if ($this->getPassword() == $data['SPassword'] && $this->getUser() == $data['Email']) {
                $_SESSION['msgUser'] = 'Bem vindo';
                header('Location: ../Views/Content.php');
            } else {
                header('Location: ../Views/LoginScreen.php');
            }
        } else {
            session_start();
            $_SESSION['errorUser'] = 'Usuário não cadastrado';
            header('Location: ../Views/LoginScreen.php');
        }
    }
}
