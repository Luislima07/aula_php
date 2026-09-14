<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>

<h3 class="mt-3 text-primary">
    Cliente
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
                    placeholder="Nome do Cliente"
                    required>
            </div>
        </div>

        <div class="form-group">
            <label for="txtemail" class="col-sm-2 col-form-label">
                Email
            </label>
            <div class="col-sm-10">
                <input
                    type="email"
                    class="form-control"
                    id="txtemail"
                    name="txtemail"
                    placeholder="email@exemplo.com"
                    required>
            </div>
        </div>

        <div class="form-group mt-3">
            <div class="col-sm-10">
                <input
                    type="submit"
                    class="btn btn-primary"
                    name="btnsalvar"
                    value="Cadastrar">

                <a href="?p=cliente" class="btn btn-danger">
                    Cancelar
                </a>
            </div>
        </div>

    </form>
</div>

<?php
if (filter_input(INPUT_POST, 'btnsalvar')) {
    require_once __DIR__ . '/../../controller/ClienteController.php';
    $clienteController = new ClienteController();

    if ($clienteController->salvar()) {
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