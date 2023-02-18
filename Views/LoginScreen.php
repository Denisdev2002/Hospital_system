<?php
session_start();
?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php if (isset($_SESSION['errorUser'])) {
        echo $_SESSION['errorUser'];
        unset($_SESSION['errorUser']);
    }
    ?>
    <form action="../Controllers/IndexLogin.php" method="post">
        <fieldset class="fieldset-form">
            <legend class="legend">Login</legend>

            <div class="inputUsers">
                <label for="textUser">Usuário</label>
                <input type="email" class="user" name="user" id="user" placeholder="Digite um email...">
            </div>
            <div class="inputPassword">
                <label for="textPassword">Senha</label>
                <input type="password" class="password" name="password" id="password" placeholder="Digite a senha...">
            </div>
            <div class="submit">
                <input type="submit" name="submit" class="submit" id="submit" value="Entrar">
            </div>
        </fieldset>

        </fieldset>
    </form>

</body>

</html>