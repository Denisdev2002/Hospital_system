<?php

use Models\Acess\Login\Login;

require_once('../Models/Acess.php');
require_once('../Lib/DatabaseConnection.php');
require_once('../Models/Error.php');

if ($_POST['name'] && $_POST['password']) {
    $user = new Login();
    $user->SQL();
    $user->verificarUsuario();
    if(isset($_SESSION['user'])){
        $_SESSION['msgUser'] = 'Bem vindo';
        header('Location: ../Views/Content.php');

    }
}
