<?php
session_start();
require_once('../Lib/DatabaseConnection.php');
require_once('../Models/Crud.php');

use Cadastro\CRUD\Form;


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = new Form();
    $user->deleteUser($id);
    header('Location: ../Views/Content.php');
}

if (isset($_GET['ID'])) {
    $id = (int)$_GET['ID'];
    $anotherUser = new Form;
    $anotherUser->ViewUser($id);
    
}
