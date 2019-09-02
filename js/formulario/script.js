function mostraTabela() {
    $.ajax({
        type: 'POST',
        url: 'tabela.php',
        data: {
            tabela: 1
        },
        success: function (data) {
            $('#tabela').html(data);
            if ($.fn.dataTable.isDataTable('#tabela-usuarios') === false) {
                loadDataTable();
            }
        }
    });
}

function limpaAlerta() {
    $('.return-form').html('');
}

function loadDataTable() {
    $('#tabela-usuarios').DataTable({
        'order': [[0, "desc"]],
        'language': {
            'url' : '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json'
        }
    });
}


$(document).ready(function () {
    $('#telefone').mask('(99) 99999999?9');

    mostraTabela();
    $('#salvar').on('click', function () {
        limpaAlerta();

        if ($('#nome').val() == "" || $('#email').val() == "") {
            alert("Os campos estão vazios.");
        } else {
            var id = $('#id').val() || 0;
            var nome = $('#nome').val();
            var email = $('#email').val();
            var acesso = $('#acesso').val();
            var senha = $('#senha').val();
            var estado = $('#estado').val();
            var cidade = $('#cidade').val();
            var telefone = $('#telefone').val();
            var acao = (id !== 0 ) ? 'alterar' : 'cadastrar';

            $.ajax({
                url: 'functions.php',
                type: 'POST',
                data: {
                    acao: acao,
                    id: id,
                    nome: nome,
                    email: email,
                    acesso: acesso,
                    senha: senha,
                    estado: estado,
                    cidade: cidade,
                    telefone: telefone

                },
                success: function (data) {
                    var response = JSON.parse(data);

                    if (response.status) {
                        var form = $("#form-cadastro");
                        form[0].reset();
                        mostraTabela();
                    }

                    $('.return-form').html(response.message);
                }
            });
        }
    });

    $(document).on('click', '.deletar', function () {
        limpaAlerta();

        var id = $(this).data('id');
        bootbox.confirm({
            message:'Confirma a exclusão do registro?',
            callback: function(confirmacao){

                if (confirmacao){
                    $.ajax({
                        url: 'functions.php',
                        type: 'POST',
                        data: {
                            acao: 'deletar',
                            id: id,
                        },
                        success: function (data) {
                            var response = JSON.parse(data);
                            //$('.return-form').html(response.message);
                            bootbox.alert('Registro excluído com sucesso.');
                            mostraTabela();
                            if (response.status) {
                                mostraTabela();
                            }
                        }
                    });
                }
                else{
                    bootbox.alert('Operação cancelada.');
                    mostraTabela();
                }
            },
            buttons: {
                cancel: {label: 'Cancelar',className:'btn-default'},
                confirm: {label: 'EXCLUIR',className:'btn-danger'}
            }
        });
    });

    $(document).on('click', '.editar', function () {
        limpaAlerta();

        var id = $(this).data('id');
        $.ajax({
            method: 'POST',
            url: 'functions.php',
            data: {
                acao: 'visualizar',
                id: id
            },
            success: function (data) {
                var dados = JSON.parse(data);
                $('#id').val(dados.id);
                $('#nome').val(dados.nome);
                $('#email').val(dados.email);
                $('#acesso').val(dados.acesso);
                $('#estado').val(dados.estado);
                $('#cidade').val(dados.cidade);
                $('#telefone').val(dados.telefone);
            }
        });
    });


    $('#sair').on('click', function () {
        window.location.href = 'logout.php';
    });


});