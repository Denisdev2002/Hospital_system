<?php


session_start();

if (isset($_SESSION['msgUser'])) {
    echo $_SESSION['msgUser'];
    unset($_SESSION['msgUser']);
}
