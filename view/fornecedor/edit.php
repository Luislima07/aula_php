<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/../../controller/FornecedorController.php';

$fornController = new FornecedorController();
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$forn = null;

if ($id) {
    $forn = $fornController->buscarPorId($id);
}

if (!$forn) {
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
                value="<?= $forn->getId() ?>"
                readonly
                style="background-color: #e9ecef; cursor: not-allowed;">
        </div>

        <div class="form-group">
            <label for="txtnome">Nome</label>
            <input
                type="text"
                class="form-control"
                id="txtnome"
                name="txtnome"
                value="<?= htmlspecialchars((string)$forn->getNome()) ?>"
                required>
        </div>

        <div class="form-group mt-3">
            <label for="txtcidade">Cidade</label>
            <textarea
                class="form-control"
                id="txtcidade"
                name="txtcidade"
                rows="3"
                required><?= htmlspecialchars((string)$forn->getCidade()) ?></textarea>
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

    if ($fornController->alterar()) {
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