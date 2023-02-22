<?php

namespace Cadastro\CRUD;

use Connection as GlobalConnection;
use PDO;

require_once('../Lib/DatabaseConnection.php');



class Form extends GlobalConnection

{
   private $name;
   private $email;
   private $identity;
   private $birth;
   private $password;
   private $confirmPassword;
   protected $sql;
   protected $verify;
   protected $data;
   protected $result;

   public function __construct()
   {
      parent::__construct();
   }

   public function getName(): string
   {
      $this->name = $_POST['name'];
      $this->limpaPost($this->name);
      return $this->name;
   }
   public function getEmail()
   {
      $this->email = $_POST['email'];
      $this->limpaPost($this->email);
      return $this->email;
   }
   public function getIdentity(): mixed
   {
      $this->identity = $_POST['identity'];
      $this->limpaPost($this->identity);
      return $this->identity;
   }
   public function getBirth()
   {
      $this->birth = $_POST['birth'];
      $this->limpaPost($this->birth);
      return $this->birth;
   }
   public function getPassword()
   {
      $this->password = $_POST['password'];
      $this->limpaPost($this->password);
      return $this->password;
   }
   public function getConfirmPassword()
   {
      $this->confirmPassword = $_POST['confirmPassowrd'];
      $this->limpaPost($this->confirmPassword);
      return $this->confirmPassword;
   }

   public function limpaPost($post)
   {
      $post = trim($post);
      $post = stripslashes($post);
      $post = htmlspecialchars($post);
      return $post;
   }

   public function sql()
   {
      $query = ("SELECT * FROM Sistema_cadastro.Cadastro where Identity = '{$this->getIdentity()}'");
      $this->verify = $this->conect->prepare($query);
      $this->data = $this->verify->fetch(PDO::FETCH_ASSOC);
      var_dump($this->data);
      if ($this->verify->execute() && $this->getIdentity() === $this->data['Identity']) {
         mysqli_close($this->conect);
         $_SESSION['msg'] = 'CPF já cadastrado';
         header('Location: ../Views/RegistrationScreen.php');
      } else {
         $query = ("INSERT INTO Sistema_cadastro.Cadastro (Full_name,Email,Identity,Birth,SPassword)VALUES('{$this->getName()}','{$this->getEmail()}','{$this->getIdentity()}','{$this->getBirth()}','{$this->getPassword()}')");
         $this->sql = $this->conect->prepare($query);
         $this->sql->execute();
      }
   }
   public function register()
   {
      if ($this->sql->execute()) {
         session_start();
         $_SESSION['msg'] = 'Usuário cadastrado com sucesso';
         header('Location: ../Views/RegistrationScreen.php');
      } else {
         session_start();
         $_SESSION['msg'] = 'Usuário não cadastrado';
         header('Location: ../Views/RegistrationScreen.php');
      }
   }
   public function showUsers()
   {
      $sql = $this->conect->prepare("SELECT * FROM  Sistema_cadastro.Cadastro WHERE IdUser");
      $sql->execute();
      $this->result = $sql->fetchAll(PDO::FETCH_ASSOC);
   }
   public function getResult()
   {
      return $this->result;
   }
   public function deleteUser(){
      $sql = $this->conect->prepare("DELETE * FROM Sistema_cadastro.Cadastro Where idUser = '{$this->result['idUser']}'");
      $sql->execute();
   }
}
