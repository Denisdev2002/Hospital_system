<?php

use Cadastro\CRUD\Form;

require_once('../Models/Crud.php');

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $edit = new Form;
    $edit->ViewUser($id);
    foreach ($edit->getResultado() as $key) :
        "<form method='post' action='../Controllers/IndexContent.php'>";
        $key[(int)'idUser'];
        echo "Nome " . $key['Full_name'] . "</br>";
        echo "<input type='text' name='updatename' id='updatename' placeholder='Atualize o seu nome'>" . "</br>";
        echo "Email " . $key['Email'] . "</br>";
        echo "<input type='email' name='updatemail' id='updatemail' placeholder='Atualize o seu email'>" . "</br>";
        echo "CPF " . $key['Identity'] . "</br>";
        echo "<input type='text' name='updateidentity' id='updateidentity' placeholder='Atualize o seu CPF'>" . "</br>";
        echo "Nascimento " . $key['Birth'] . "</br>";
        echo "<input type='text' name='updatebirth' id='updatebirth' placeholder='Atualize a sua data de nascimento'>" . "</br>";
        echo "Senha " . $key['SPassword'] . "</br>";
        echo "<input type='password' name='updatepassword' id='updatepassword' placeholder='Atualize a sua senha'>" . "</br>";
        echo "<input type='submit' name='submitedit' id='submitedit'value='Salvar''>" . "</br>";
        "/form";

    endforeach;
}
