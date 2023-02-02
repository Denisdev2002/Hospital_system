<?php

namespace Cadastro\CRUD;

use Connection as GlobalConnection;


require_once('../Lib/DatabaseConnection.php');



class Form extends GlobalConnection

{
   private $name;
   private $email;
   private $identity;
   private $birth;
   private $password;
   private $confirmPassword;
   protected $conn;

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
   public function getEmail(): string
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
   public function getBirth(): mixed
   {
      $this->birth = $_POST['birth'];
      $this->limpaPost($this->birth);
      return $this->birth;
   }
   public function getPassword(): mixed
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

   public function Insertion()
   {

      $query = ("INSERT INTO Sistema_cadastro.Cadastro (Full_name,Email,Identity,Birth,SPassword)VALUES('{$this->getName()}','{$this->getEmail()}','{$this->getIdentity()}','{$this->getBirth()}','{$this->getPassword()}')");
      $sql = $this->conect->query($query);
   }
}
