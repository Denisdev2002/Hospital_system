<?php
session_start();

class ErrorMessage
{
    public function errorName()
    {
        $_SESSION['errorName'] = "<p style='color: #ff0000'>Campo nome obrigatório";
        return $_SESSION['errorName'];
    }
    public function errorEmail(){
        $_SESSION['errorEmail'] = "<p style='color: #ff0000'>Campo email obrigátorio";
        return $_SESSION['errorEmail'];
    }
    public function errorIdentity(){
        $_SESSION['errorIdentity'] = "<p style='color: #ff0000'>Campo CPF obrigátorio";
        return $_SESSION['errorIdentity'];
    }
    public function errorBirth(){
        $_SESSION['errorBirth'] = "<p style='color: #ff0000'>Campo nascimento obrigátorio";
        return $_SESSION['errorBirth'];
    }
    public function errorPassword(){
        $_SESSION['errorPassword'] = "<p style='color: #ff0000'>Campo senha obrigátorio";
        return $_SESSION['errorPassword'];
    }
    public function errorConfirmPassword(){
        $_SESSION['errorConfirmPassword'] = "<p style='color: #ff0000'>Campo confirmação de senha obrigátorio";
        return $_SESSION['errorEmail'];
    }
}
