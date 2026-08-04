<?php


include_once 'C:\Users\gl401\Downloads\usbwebserver\root\Php_proj_1\models\fornecedor.php';

$cat = new Fornecedor();

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {
    $cat->setId($id);
    $dados = $cat->consultarPorID();
}
?>

<h3 class="mt-3 text-primary">
    Editar Fornecedor
</h3>

<div class="card shadow mt-3">
    <form method="post" class="m-3">

        <input type="hidden" name="txtid" value="<?= $dados['id'] ?>">

        <div class="form-group">
            <label for="txtnome">Nome</label>
            <input
                type="text"
                class="form-control"
                id="txtnome"
                name="txtnome"
                value="<?= $dados['nome'] ?>"
                required>
        </div>

        <div class="form-group mt-3">
            <label for="txtcidade">Cidade</label>
            <textarea
                class="form-control"
                id="txtcidade"
                name="txtcidade"
                rows="3"
                required><?= $dados['ciadade'] ?></textarea>
        </div>

        <div class="mt-3">
            <input
                type="submit"
                name="btnalterar"
                value="Salvar"
                class="btn btn-primary">

            <a href="?p=fornecedor" class="btn btn-danger">
                Cancelar
            </a>
        </div>

    </form>
</div>

<?php

if (filter_input(INPUT_POST, 'btnalterar')) {

    $cat->setId(filter_input(INPUT_POST, 'txtid'));
    $cat->setNome(filter_input(INPUT_POST, 'txtnome'));
    $cat->setCidade(filter_input(INPUT_POST, 'txtcidade'));

    if ($cat->crudPhp("A")) {
        ?>
        <div class="alert alert-success mt-3">
            Fornecedor alterada com sucesso.
        </div>
        <meta http-equiv="refresh" content="1;URL=?p=fornecedor">
        <?php
    } else {
        ?>
        <div class="alert alert-danger mt-3">
            Erro ao alterar a Fornecedor.
        </div>
        <?php
    }
}
?>