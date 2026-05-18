<h3 class="mt-3 text-primary">
    Fornecedor
</h3>

<div class="card shadow mt-3"><!-- acrescentei um card com sombra aqui tbm -->
    <form method="post" name="formsalvar" id="formSalvar" class="m-3" enctype="multipart/form-data">

        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">
                Nome
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="txtnome" name="txtnome" placeholder="Nome do Fornecedor"
                    value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputText" class="col-sm-2 col-form-label">
                Cidade - UF
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="txtCidade" name="txtCidade" placeholder="Cidade"
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
            <a href="?p=fornecedor" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
    <?php
if (filter_input(INPUT_POST, 'btnsalvar')) {
    $nome = filter_input(INPUT_POST, 'txtnome');
    $cidade = filter_input(INPUT_POST, 'txtCidade');

    include_once '../Php_proj_1\models\fornecedor.php';
    $cat = new Fornecedor();
    $cat->setId(NULL);
    $cat->setNome($nome);
    $cat->setCidade($cidade);

    if ($cat->salvar()) {
?>
        <div class="alert alert-primary mt-3" role="alert">
            Cidade - cadastro efetuado com sucesso.
        </div>
    <?php
    } else {
    ?>
        <div class="alert alert-danger mt-3" role="alert">
            Cidade - erro ao cadastrar.
        </div>
<?php
    }
}