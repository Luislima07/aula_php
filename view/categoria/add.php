<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<h3 class="mt-3 text-primary">
    Categoria
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
                    placeholder="Categoria"
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

                <a href="?p=categoria" class="btn btn-danger">
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

    // Usa __DIR__ para caminhar corretamente a partir do diretório atual (view/categoria)
    require_once __DIR__ . '/../../model/Categoria.php';
    require_once __DIR__ . '/../../dao/CategoriaDAO.php';

    // Instancia o modelo e preenche os dados do formulário
    $cat = new Categoria();
    $cat->setNome($nome);
    $cat->setInformacoes($info);

    // Instancia a DAO e salva a categoria no banco de dados
    $catDAO = new CategoriaDAO();

    if ($catDAO->salvar($cat)) {
?>
        <div class="alert alert-success mt-3" role="alert">
            Categoria cadastrada com sucesso.
        </div>
        <meta http-equiv="refresh" content="1;URL=?p=categoria">
<?php
    } else {
?>
        <div class="alert alert-danger mt-3" role="alert">
            Erro ao cadastrar a categoria.
        </div>
<?php
    }
}
?>