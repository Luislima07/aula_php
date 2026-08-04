<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<h3 class="mt-3 text-primary">
    Fornecedor
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
                    placeholder="Fornecedor"
                    required>
            </div>
        </div>

        <div class="form-group">
            <label for="txtcidade" class="col-sm-2 col-form-label">
                Cidade
            </label>
            <div class="col-sm-10">
                <textarea
                    name="txtcidade"
                    id="txtcidade"
                    rows="3"
                    class="form-control"
                    placeholder="Cidade aqui"
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

                <a href="?p=fornecedor" class="btn btn-danger">
                    Cancelar
                </a>
            </div>
        </div>

    </form>
</div>

<?php

if (filter_input(INPUT_POST, 'btnsalvar')) {

    $nome = filter_input(INPUT_POST, 'txtnome');
    $cidade = filter_input(INPUT_POST, 'txtcidade');

    include_once '../Php_proj_1/models/fornecedor.php';

    $cat = new Fornecedor();
    $cat->setNome($nome);
    $cat->setCidade($cidade);

    if ($cat->crudPhp("I")) {
?>
        <div class="alert alert-success mt-3" role="alert">
            Fornecedor cadastrada com sucesso.
        </div>
        <meta http-equiv="refresh" content="1;URL=?p=fornecedor">
<?php
    } else {
?>
        <div class="alert alert-danger mt-3" role="alert">
            Erro ao cadastrar a fornecedor.
        </div>
<?php
    }
}
?>