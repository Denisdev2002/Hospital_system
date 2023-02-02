<?php

require_once('../Models/Crud.php');
require_once('../Lib/DatabaseConnection.php');

use Cadastro\CRUD\Form;

class Confirmar extends Form
{
}

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
         $obj->Insertion();
         session_start();
         $_SESSION['msg'] = 'Usuário cadastrado com sucesso';
         header('Location: ../Views/RegistrationScreen.php');
      } else {
         session_start();
         $_SESSION['msg'] = 'Falha';
         header('Location: ../Views/RegistrationScreen.php');
      }
   }
}
