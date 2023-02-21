<?php

require_once("../Models/Crud.php");
session_start();

if (isset($_SESSION['msgUser'])) {
    echo $_SESSION['msgUser'];
    unset($_SESSION['msgUser']);
}else{
    header('Location: ../Views/LoginScreen.php');
}
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conteúdo</title>
</head>
<body>
    
    
    
</body>
</html>

