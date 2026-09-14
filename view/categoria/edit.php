<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Incluindo apenas o controller
require_once __DIR__ . '/../../controller/CategoriaController.php';

$catController = new CategoriaController();
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$cat = null;

if ($id) {
    // Usando o método consultarPorID original do seu sistema
    $cat = $catController->buscarPorId($id);
}

if (!$cat) {
    echo '<div class="alert alert-danger mt-3">Categoria não encontrada.</div>';
    echo '<a href="?p=categoria" class="btn btn-secondary">Voltar</a>';
    return;
}
?>

<h3 class="mt-3 text-primary">
    Editar Categoria
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
                value="<?= $cat->getId() ?>"
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
                value="<?= htmlspecialchars((string)$cat->getNome()) ?>"
                required>
        </div>

        <div class="form-group mt-3">
            <label for="txtinformacoes">Informações</label>
            <textarea
                class="form-control"
                id="txtinformacoes"
                name="txtinformacoes"
                rows="3"
                required><?= htmlspecialchars((string)$cat->getInformacoes()) ?></textarea>
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

    // Utilizando o método alterar do Controller
    if ($catController->alterar()) {
?>
        <div class="alert alert-success mt-3">
            Categoria alterada com sucesso.
        </div>
        <meta http-equiv="refresh" content="1;URL=?p=categoria">
    <?php
    } else {
    ?>
        <div class="alert alert-danger mt-3">
            Erro ao alterar a categoria.
        </div>
<?php
    }
}
?>