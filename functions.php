<?php
require_once "class/Usuario.class.php";
$acao = isset($_POST['acao']) ? trim(strip_tags(($_POST['acao']))) : null;

if ($acao === "cadastrar" || $acao === "alterar") {
    $id = trim(strip_tags($_POST['id']));
    $nome = (trim(strip_tags($_POST['nome'])));
    $email = (trim(strip_tags($_POST['email'])));
    $acesso = (trim(strip_tags($_POST['acesso'])));
    $estado = (trim(strip_tags($_POST['estado'])));
    $cidade = (trim(strip_tags($_POST['cidade'])));
    $telefone = (trim(strip_tags($_POST['telefone'])));

    $usuario = new Usuario($id, $nome, $email, $telefone, $acesso, $estado, $cidade);
    $message = '<div class="alert alert-danger" role="alert">Erro ao cadastrar usuário!</div>';
    $status = false;

    if ($id == 0 || $id == null) {
        $response = $usuario->cadastrar();

        if ($response) {
            $status = true;
            $message = '<div class="alert alert-success" role="alert">Usuário cadastrado com sucesso!</div>';
        }
    } else {
        $message = '<div class="alert alert-danger" role="alert">Erro ao alterar usuário!</div>';
        $response = $usuario->alterar();

        if ($response) {
            $status = true;
            $message = '<div class="alert alert-success" role="alert">Usuário alterado com sucesso!</div>';
        }

    }

    echo json_encode([
        'status' => $status,
        'message' => $message
    ]);
} else if ($acao === "deletar") {
    $id = trim(strip_tags($_POST['id']));
    $usuario = new Usuario();
    $usuario->setId($id);
    $message = '<div class="alert alert-danger" role="alert">Erro ao excluir usuário!</div>';
    $status = false;

    $resultado = $usuario->deletar();

    if ($resultado) {
        $status = true;
        $message = '<div class="alert alert-success" role="alert">Usuário excluído com sucesso!</div>';
    }

    echo json_encode([
        'status' => $status,
        'message' => $message
    ]);

} else if ($acao === "visualizar") {
    $id = trim(strip_tags($_POST['id']));
    $usuario = new Usuario();
    $usuario->setId($id);
    $resultado = $usuario->procuraId();

    echo json_encode($resultado);
}

die();