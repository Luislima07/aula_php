<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../model/Cliente.php';
require_once __DIR__ . '/../../dao/ClienteDAO.php';

$clienteDAO = new ClienteDAO();
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$cliente = null;

if ($id) {
    $cliente = $clienteDAO->consultarPorID($id);
}

if (!$cliente) {
    echo '<div class="alert alert-danger mt-3">Cliente não encontrado.</div>';
    echo '<a href="?p=cliente" class="btn btn-secondary">Voltar</a>';
    return;
}
?>

<h3 class="mt-3 text-primary">
    Editar Cliente
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
                value="<?= $cliente->getId() ?>"
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
                value="<?= htmlspecialchars((string)$cliente->getNome()) ?>"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="txtemail">Email</label>
            <input
                type="email"
                class="form-control"
                id="txtemail"
                name="txtemail"
                value="<?= htmlspecialchars((string)$cliente->getEmail()) ?>"
                required>
        </div>

        <div class="mt-3">
            <input
                type="submit"
                name="btnalterar"
                value="Salvar"
                class="btn btn-primary">

            <a href="?p=cliente" class="btn btn-danger">
                Cancelar
            </a>
        </div>

    </form>
</div>

<?php
if (filter_input(INPUT_POST, 'btnalterar')) {

    $idPost = filter_input(INPUT_POST, 'txtid', FILTER_VALIDATE_INT);
    $nomePost = filter_input(INPUT_POST, 'txtnome');
    $emailPost = filter_input(INPUT_POST, 'txtemail', FILTER_SANITIZE_EMAIL);

    $clienteEdit = new Cliente();
    $clienteEdit->setId($idPost);
    $clienteEdit->setNome($nomePost);
    $clienteEdit->setEmail($emailPost);

    if ($clienteDAO->salvar($clienteEdit)) {
        ?>
        <div class="alert alert-success mt-3">
            Cliente alterado com sucesso.
        </div>
        <meta http-equiv="refresh" content="1;URL=?p=cliente">
        <?php
    } else {
        ?>
        <div class="alert alert-danger mt-3">
            Erro ao alterar o cliente.
        </div>
        <?php
    }
}
?>