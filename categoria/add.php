<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<h3 class="mt-3 text-primary">
    Categoria
</h3>

<div class="card shadow mt-3 " >
    <form method="post" name="formsalvar" id="formSalvar" class="m-3 gap-md-3" enctype="multipart/form-data">

        <div class="form-group">
            <label for="txtnome" class="col-sm-2 col-form-label">
                Nome
            </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="txtnome" name="txtnome" placeholder="Categoria"
                    value="">
            </div>
        </div>
        <div class="form-group ">
            <label for="txtinformacoes" class="col-sm-2 col-form-label">
                Informações
            </label>
            <div class="col-sm-10">
                <textarea name="txtinformacoes" id="txtinformacoes" rows="3" placeholder="Informações aqui" class="form-control"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
                <input type="submit"
                    class="btn btn-primary"
                    name="btnsalvar"
                    value="Cadastrar">
                    <a href="?p=categorias" class="btn btn-danger">Cancelar</a>
            </div>
            <!-- faltou um link aqui-->
        </div>
    </form>
</div>
<?php
if (filter_input(INPUT_POST, 'btnsalvar')) {
    $nome = filter_input(INPUT_POST, 'txtnome');
    $info = filter_input(INPUT_POST, 'txtinformacoes');

    include_once '../Php_proj_1\models\categoria.php';
    $cat = new Categoria();
    $cat->setId(NULL);
    $cat->setNome($nome);
    $cat->setInformacoes($info);

    if ($cat->salvar()) {
?>
        <div class="alert alert-primary mt-3" role="alert">
            Categoria - cadastro efetuado com sucesso.
        </div>
    <?php
    } else {
    ?>
        <div class="alert alert-danger mt-3" role="alert">
            Categoria - erro ao cadastrar.
        </div>
<?php
    }
}
