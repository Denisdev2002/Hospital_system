<?php

require_once('../Models/Crud.php');
require_once('../Lib/DatabaseConnection.php');
require_once('../Models/Error.php');

use Cadastro\CRUD\Form;

if (isset($_POST['submit'])) {
   if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['identity']) && !empty($_POST['birth']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])) {
      if ($_POST['password'] === $_POST['confirmPassword']) {
         $obj = new Form;
         $obj->getName();
         $obj->getEmail();
         $obj->getIdentity();
         $obj->getBirth();
         $obj->getPassword();
         $obj->getConfirmPassword();
         $obj->sql();
         $obj->register();
      } else {
         session_start();
         $_SESSION['msg'] = 'Senhas diferentes';
         header('Location: ../Views/RegisterScreen.php');
         mysqli_close($this->conect);
      }
   } else {
      $erro = new ErrorMessage();
      header('Location: ../Views/RegisterScreen.php ');
      if (empty($_POST['name'])) {
         $erro->errorName();
      }
      if (empty($_POST['email'])) {
         $erro->errorEmail();
      }
      if (empty($_POST['identity'])) {
         $erro->errorIdentity();
      }
      if (empty($_POST['birth'])) {
         $erro->errorBirth();
      }
      if (empty($_POST['password'])) {
         $erro->errorPassword();
      }
      if (empty($_POST['confirmPassword'])) {
         $erro->errorConfirmPassword();
      }
   }
}
