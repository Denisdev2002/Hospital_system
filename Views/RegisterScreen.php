<?php
session_start();
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <title>Cadastro</title>
</head>

<body>
    <form method="post" action="../Controllers/IndexRegister.php">
        <?php if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            session_unset();
        } ?>
        <fieldset>
            <legend>Cadastro</legend>
            <div class="inputName">
                <label for="textName">Nome</label>
                <?php if (isset($_SESSION['errorName'])) {
                    echo $_SESSION['errorName'];
                    unset($_SESSION['errorName']);
                } ?>
                <input type="text" id="name" name="name" placeholder="Digite o seu nome completo...">
            </div>
            <div class="inputEmail">

                <label for="texteEmail">E-mail</label>
                <?php if (isset($_SESSION['errorEmail'])) {
                    echo $_SESSION['errorEmail'];
                    unset($_SESSION['errorEmail']);
                } ?>
                <input type="email" id="email" name="email" placeholder="fulano123@provedor.com">
            </div>
            <div class="Identity">

                <label for="textIdentity">CPF</label>
                <?php if (isset($_SESSION['errorIdentity'])) {
                    echo $_SESSION['errorIdentity'];
                    unset($_SESSION['errorIdentity']);
                } ?>
                <input type="text" id="identity" name="identity" placeholder="000.000.000-00">
            </div>
            <div class="inputBirth">
                <label for="textBirth">Nascimento</label>
                <?php if (isset($_SESSION['errorBirth'])) {
                    echo $_SESSION['errorBirth'];
                    unset($_SESSION['errorBirth']);
                } ?>
                <input type="date" id="birth" name="birth" max="2022-12-30">
            </div>
            <div class="inputPassword">

                <label for="textePassword">Senha</label>
                <?php if (isset($_SESSION['errorPassword'])) {
                    echo $_SESSION['errorPassword'];
                    unset($_SESSION['errorPassword']);
                } ?>
                <input type="password" id="password" name="password" placeholder="Digite uma senha" minlength="6" maxlength="10">
            </div>
            <div class="inputConfirmPassword">

                <label for="textConfirmPassowrd">Confirmação da senha</label>
                <?php if (isset($_SESSION['errorConfirmPassword'])) {
                    echo $_SESSION['errorConfirmPassword'];
                    unset($_SESSION['errorConfirmPassword']);
                } ?>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Repita novamente a senha" minlength="6" maxlength="10">
            </div>
        </fieldset>
        <div class="inputSubmit">
            <input type="submit" id="submit" name="submit" value="Cadastrar">
        </div>
    </form>
    <a href="../Views/LoginScreen.php">Login</a>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#submit').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "Controllers/IndexRegister.php",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "text",
                    success: function(msg) {
                        $($_SESSION['msg'].text(msg))
                    }
                })
            })
        })
    </script>
</body>

</html>