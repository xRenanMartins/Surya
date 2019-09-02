<?php
/**
 * Created by PhpStorm.
 * User: renan
 * Date: 01/09/2019
 * Time: 01:09
 */
require_once "class/Usuario.class.php";

?>
<table id="tabela-usuarios" class="table table-responsive">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Acesso</th>
        <th>Estado</th>
        <th>Cidade</th>
        <th>telefone</th>
        <th>Alterar</th>
        <th>Excluir</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $usuario = new Usuario();
    $lista = $usuario->listar();

    foreach ($lista as $usuario) {
        ?>
        <tr>
            <th><?= $usuario['id'] ?></th>
            <th id="nome"><?= $usuario['nome'] ?></th>
            <th><?= $usuario['email'] ?></th>
            <th><?= $usuario['acesso'] ?></th>
            <th><?= $usuario['estado'] ?></th>
            <th><?= $usuario['cidade'] ?></th>
            <th><?= $usuario['telefone'] ?></th>
            <th>
                <a style="cursor:pointer;" class="btn btn-warning editar" data-id="<?= $usuario['id']; ?>">
                    <span class="glyphicon glyphicon-edit"></span> Editar</a>
            </th>
            <th>
                <a style="cursor:pointer;" class="btn btn-danger deletar" data-id="<?= $usuario['id']; ?>">
                    <span class="glyphicon glyphicon-trash"></span> Deletar</a>
            </th>
        </tr>
    <?php } ?>
    </tbody>
</table>

