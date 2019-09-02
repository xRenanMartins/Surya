<?php
/**
 * Created by PhpStorm.
 * User: renan
 * Date: 02/09/2019
 * Time: 00:11
 */

if (isset($_POST['logar'])) {
    include('class/Conexao.php');
    require_once "class/Usuario.class.php";

    $usuario = new UsuarioDao();

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    $user = $usuario->login($email, $senha);
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
    <?php if(isset($_GET['erro'])) {
        echo '<div class="alert alert-danger">Dados de login incorretos</div>';
    } ?>
    <h2 class="text-center">SuryaDental - Login</h2>
    <hr>
    <form method="post">
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="lembrar"> lembrar-me
            </label>
        </div>
        <input type="submit" class="btn btn-primary" id="logar" name="logar" value="Logar">
    </form>
    <br>
    <button onclick="registro()" class="btn btn-warning">Cadastre-se</button>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script src="js/formulario/login.js"></script>

<script>

</script>

</body>
</html>
