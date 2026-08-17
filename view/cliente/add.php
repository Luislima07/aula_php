<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<h3 class="mt-3 text-primary">
    Cliente
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
                placeholder="Nome do Cliente"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="txtemail">Email</label>
            <input
                type="email"
                class="form-control"
                id="txtemail"
                name="txtemail"
                placeholder="email@exemplo.com"
                required>
        </div>

        <div class="mt-3">
            <input
                type="submit"
                class="btn btn-primary"
                name="btnsalvar"
                value="Cadastrar">

            <a href="?p=cliente" class="btn btn-danger">
                Cancelar
            </a>
        </div>

    </form>
</div>

<?php
if (filter_input(INPUT_POST, 'btnsalvar')) {

    $nome = filter_input(INPUT_POST, 'txtnome');
    $email = filter_input(INPUT_POST, 'txtemail', FILTER_SANITIZE_EMAIL);

    require_once __DIR__ . '/../../model/Cliente.php';
    require_once __DIR__ . '/../../dao/ClienteDAO.php';

    $cliente = new Cliente();
    $cliente->setNome($nome);
    $cliente->setEmail($email);

    $clienteDAO = new ClienteDAO();

    if ($clienteDAO->salvar($cliente)) {
?>
        <div class="alert alert-success mt-3" role="alert">
            Cliente cadastrado com sucesso.
        </div>
        <meta http-equiv="refresh" content="1;URL=?p=cliente">
<?php
    } else {
?>
        <div class="alert alert-danger mt-3" role="alert">
            Erro ao cadastrar o cliente.
        </div>
<?php
    }
}
?>