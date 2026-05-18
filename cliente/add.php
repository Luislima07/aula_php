<h3 class="mt-3 text-primary">
    Cliente
</h3>

<div class="card shadow mt-3"><!-- acrescentei um card com sombra aqui tbm -->
    <form method="post" name="formsalvar" id="formSalvar" class="m-3" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">
                Nome
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="txtnome" name="txtnome" placeholder="Nome do cliente"
                    value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">
                Email
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="txtEmail" name="txtEmail" placeholder="cliente@email.com"
                    value="">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <input type="submit"
                    class="btn btn-primary"
                    name="btnsalvar"
                    value="Cadastrar">
            </div>
            <a href="?p=cliente" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (filter_input(INPUT_POST, 'btnsalvar')) {
    $nome = filter_input(INPUT_POST, 'txtnome');
    $email = filter_input(INPUT_POST, 'txtEmail');

    include_once '../Php_proj_1\models\clientes.php';
    $cat = new Clientes();
    $cat->setId(NULL);
    $cat->setNome($nome);
    $cat->setEmail($email);

    if ($cat->salvar()) {
?>
        <div class="alert alert-primary mt-3" role="alert">
            Cliente - cadastro efetuado com sucesso.
        </div>
    <?php
    } else {
    ?>
        <div class="alert alert-danger mt-3" role="alert">
            Cliente - erro ao cadastrar.
        </div>
<?php
    }
}
