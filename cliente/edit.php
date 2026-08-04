<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../Php_proj_1/models/clientes.php';

$cat = new Clientes();

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {
    $cat->setId($id);
    $dados = $cat->consultarPorID();
}
?>

<h3 class="mt-3 text-primary">
    Editar Cliente
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
            <label for="txtemail">Email</label>
            <textarea
                class="form-control"
                id="txtemail"
                name="txtemail"
                rows="3"
                required><?= $dados['email'] ?></textarea>
        </div>

        <div class="mt-3">
            <input
                type="submit"
                name="btnalterar"
                value="Salvar"
                class="btn btn-primary">

            <a href="?p=categoria" class="btn btn-danger">
                Cancelar
            </a>
        </div>

    </form>
</div>

<?php

if (filter_input(INPUT_POST, 'btnalterar')) {

    $cat->setId(filter_input(INPUT_POST, 'txtid'));
    $cat->setNome(filter_input(INPUT_POST, 'txtnome'));
    $cat->setEmail(filter_input(INPUT_POST, 'txtemail'));

    if ($cat->crudPhp("A")) {
        ?>
        <div class="alert alert-success mt-3">
            Cliente alterado com sucesso.
        </div>
        <meta http-equiv="refresh" content="1;URL=?p=cliente">
        <?php
    } else {
        ?>
        <div class="alert alert-danger mt-3">
            Erro ao alterar o Cliente.
        </div>
        <?php
    }
}
?>