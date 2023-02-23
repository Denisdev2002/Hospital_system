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
    foreach ($anotherUser->getResultado() as $key) :
        echo "ID :" . $key[(int)'idUser'] . "</br>";
        echo "Nome :" . $key['Full_name'] . "</br>";
        echo "<input type='text' name='updatename' id='updatename' placeholder='Atualize o seu nome'>" . "</br>";
        echo "Email :" . $key['Email'] . "</br>";
        echo "CPF :" . $key['Identity'] . "</br>";
        echo "Nascimento :" . $key['Birth'] . "</br>";
        echo "Senha :" . $key['SPassword'] . "</br>";

    endforeach;
}
