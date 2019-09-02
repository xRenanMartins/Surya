<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <title>Cadastro</title>
</head>
<body>
<div class="container jumbotron">
    <div class="col-md-12">
    <h2>Olá <?php var_dump($_SESSION); ?>!</h2>
    <a href="logout.php"><button type="button" class="btn-danger">Sair</button></a>
    </div>
    <div class="col-md-12 text-center">
        <h1>Cadastro de Usuários</h1>
    </div>
    <form id="form-cadastro" method="post">
        <div class="row">
            <div class="col-md-4">
                <input type="hidden" id="id" name="id" >
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" autofocus>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nível de Acesso</label>
                    <select id="acesso" name="acesso" class="form-control">
                        <option>Selecione</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Gestor">Gestor</option>
                        <option value="Colaborador">Colaborador</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="estado" class="form-control" id="estado" name="estado" maxlength="2">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="cidade" class="form-control" id="cidade" name="cidade">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="telefone" class="form-control" id="telefone" name="telefone">
                </div>
            </div>
            <div class="col-md-12 form-group">
                <!-- <button type="submit" class="btn btn-primary center" name="cadastrar">Cadastrar</button> -->
                <button type="button" id="salvar" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Salvar</button>
            </div>

            <div class="col-md-12 return-form"></div>
        </div>
    </form>

    <div id="tabela"></div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
<script src="js/jquery.maskedinput-1.3.1.min.js"></script>
<script src="js/formulario/cadastro.js"></script>
<script src="js/formulario/script.js"></script>

</body>
</html>