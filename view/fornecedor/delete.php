<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {
    require_once __DIR__ . '/../../dao/FornecedorDAO.php';

    $fornDAO = new FornecedorDAO();

    if ($fornDAO->excluir($id)) {
?>
        <div class="alert alert-primary" role="alert">
            Fornecedor excluído com sucesso.
        </div>
<?php
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Erro ao excluir o fornecedor.
        </div>
<?php
    }
}
?>

<meta http-equiv="refresh" content="1;URL=?p=fornecedor">