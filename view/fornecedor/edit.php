<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../model/Fornecedor.php';
require_once __DIR__ . '/../../dao/FornecedorDAO.php';

$fornDAO = new FornecedorDAO();
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$fornecedor = null;

if ($id) {
    $fornecedor = $fornDAO->consultarPorID($id);
}

if (!$fornecedor) {
    echo '<div class="alert alert-danger mt-3">Fornecedor não encontrado.</div>';
    echo '<a href="?p=fornecedor" class="btn btn-secondary">Voltar</a>';
    return;
}
?>

<h3 class="mt-3 text-primary">
    Editar Fornecedor
</h3>

<div class="card shadow mt-3">
    <form method="post" class="m-3">

        <div class="form-group mb-3">
            <label for="txtid">ID</label>
            <input
                type="text"
                class="form-control"
                id="txtid"
                name="txtid"
                value="<?= $fornecedor->getId() ?>"
                readonly
                style="background-color: #e9ecef; cursor: not-allowed;">
        </div>

        <div class="form-group mb-3">
            <label for="txtnome">Nome</label>
            <input
                type="text"
                class="form-control"
                id="txtnome"
                name="txtnome"
                value="<?= htmlspecialchars((string)$fornecedor->getNome()) ?>"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="txtcidade">Cidade</label>
            <input
                type="text"
                class="form-control"
                id="txtcidade"
                name="txtcidade"
                value="<?= htmlspecialchars((string)$fornecedor->getCidade()) ?>"
                required>
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

    $idPost = filter_input(INPUT_POST, 'txtid', FILTER_VALIDATE_INT);
    $nomePost = filter_input(INPUT_POST, 'txtnome');
    $cidadePost = filter_input(INPUT_POST, 'txtcidade');

    $fornEdit = new Fornecedor();
    $fornEdit->setId($idPost);
    $fornEdit->setNome($nomePost);
    $fornEdit->setCidade($cidadePost);

    if ($fornDAO->salvar($fornEdit)) {
        ?>
        <div class="alert alert-success mt-3">
            Fornecedor alterado com sucesso.
        </div>
        <meta http-equiv="refresh" content="1;URL=?p=fornecedor">
        <?php
    } else {
        ?>
        <div class="alert alert-danger mt-3">
            Erro ao alterar o fornecedor.
        </div>
        <?php
    }
}
?>