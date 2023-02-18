<?php

use Models\Acess\Login\Login;

require_once('../Models/Acess.php');
require_once('../Lib/DatabaseConnection.php');
require_once('../Models/Error.php');

if (isset($_POST['submit'])) {
    if (!empty($_POST['user']) && (!empty($_POST['password']))) {
        $user = new Login();
        $user->getUser();
        $user->getPassword();
        $user->Sql();
        $user->connect();
    }
}
