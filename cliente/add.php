<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<h3 class="mt-3 text-primary">
    Cliente
</h3>

<div class="card shadow mt-3">
    <form method="post" name="formsalvar" id="formSalvar" class="m-3 gap-md-3">

        <div class="form-group">
            <label for="txtnome" class="col-sm-2 col-form-label">
                Nome
            </label>
            <div class="col-sm-10">
                <input
                    type="text"
                    class="form-control"
                    id="txtnome"
                    name="txtnome"
                    placeholder="Cliente"
                    required>
            </div>
        </div>

        <div class="form-group">
            <label for="txtinformacoes" class="col-sm-2 col-form-label">
                Informações
            </label>
            <div class="col-sm-10">
                <textarea
                    name="txtinformacoes"
                    id="txtinformacoes"
                    rows="3"
                    class="form-control"
                    placeholder="Informações aqui"
                    required></textarea>
            </div>
        </div>

        <div class="form-group mt-3">
            <div class="col-sm-10">
                <input
                    type="submit"
                    class="btn btn-primary"
                    name="btnsalvar"
                    value="Cadastrar">

                <a href="?p=cliente" class="btn btn-danger">
                    Cancelar
                </a>
            </div>
        </div>

    </form>
</div>

<?php

if (filter_input(INPUT_POST, 'btnsalvar')) {

    $nome = filter_input(INPUT_POST, 'txtnome');
    $info = filter_input(INPUT_POST, 'txtinformacoes');

    include_once '../Php_proj_1/models/clientes.php';

    $cat = new Clientes();
    $cat->setNome($nome);
    $cat->setEmail($info);

    if ($cat->crudPhp("I")) {
?>
        <div class="alert alert-success mt-3" role="alert">
            Cliente cadastrada com sucesso.
        </div>
        <meta http-equiv="refresh" content="1;URL=?p=cliente">
<?php
    } else {
?>
        <div class="alert alert-danger mt-3" role="alert">
            Erro ao cadastrar a cliente.
        </div>
<?php
    }
}
?>