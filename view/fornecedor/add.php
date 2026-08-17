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

        <div class="form-group mb-3">
            <label for="txtnome">Nome</label>
            <input
                type="text"
                class="form-control"
                id="txtnome"
                name="txtnome"
                placeholder="Nome do Fornecedor"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="txtcidade">Cidade</label>
            <input
                type="text"
                class="form-control"
                id="txtcidade"
                name="txtcidade"
                placeholder="Nome da Cidade"
                required>
        </div>

        <div class="mt-3">
            <input
                type="submit"
                class="btn btn-primary"
                name="btnsalvar"
                value="Cadastrar">

            <a href="?p=fornecedor" class="btn btn-danger">
                Cancelar
            </a>
        </div>

    </form>
</div>

<?php
if (filter_input(INPUT_POST, 'btnsalvar')) {

    $nome = filter_input(INPUT_POST, 'txtnome');
    $cidade = filter_input(INPUT_POST, 'txtcidade');

    require_once __DIR__ . '/../../model/Fornecedor.php';
    require_once __DIR__ . '/../../dao/FornecedorDAO.php';

    $fornecedor = new Fornecedor();
    $fornecedor->setNome($nome);
    $fornecedor->setCidade($cidade);

    $fornDAO = new FornecedorDAO();

    if ($fornDAO->salvar($fornecedor)) {
?>
        <div class="alert alert-success mt-3" role="alert">
            Fornecedor cadastrado com sucesso.
        </div>
        <meta http-equiv="refresh" content="1;URL=?p=fornecedor">
<?php
    } else {
?>
        <div class="alert alert-danger mt-3" role="alert">
            Erro ao cadastrar o fornecedor.
        </div>
<?php
    }
}
?>