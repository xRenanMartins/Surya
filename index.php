<?php
/**
 * Created by PhpStorm.
 * User: renan
 * Date: 02/09/2019
 * Time: 00:11
 */


if ($_POST) {
    include('class/Conexao.php');
    require_once "class/Usuario.class.php";

    $usuario = new Usuario();

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    $user = $usuario->login($email, $senha);

    if ($user == true) {
        session_start();
        $_SESSION['login'] = $email;
        $_SESSION['senha'] = $senha;
        header('location: Cadastro.php');
    } else {
        header('location:index.php?erro=senha');
    }

}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SuryaDental - Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
</head>
<body>
<div class="container jumbotron">

    <?php

    if (isset($_GET['erro'])) {
        echo '<div class="alert alert-danger">Dados de login incorretos</div>';
    }

    if (isset($_GET['success'])) {
        echo '<div class="alert alert-success">Logout efetuado com sucesso</div>';
    }

    ?>
    <h2>SuryaDental - Login</h2>
    <hr>
    <form method="post">
        <div class="form-group">
            <label for="email">Login</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="lembrar"> lembrar-me
            </label>
        </div>
        <input type="submit" class="btn btn-primary" name="logar" value="Logar">
    </form>
    <br>
    <a href="cadastro.php">Cadastre-se</a>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    setTimeout(function () {
        $('.alert').fadeOut();
    }, 3000);
</script>

</body>
</html>
