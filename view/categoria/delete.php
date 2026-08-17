<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {
    // Inclui a DAO responsável por gerenciar o banco de dados
    require_once __DIR__ . '/../../dao/CategoriaDAO.php';

    $catDAO = new CategoriaDAO();

    // Executa a exclusão passando o ID recebido via GET
    if ($catDAO->excluir($id)) {
?>
        <div class="alert alert-primary" role="alert">
            Categoria excluída com sucesso.
        </div>
<?php
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Erro ao excluir a categoria.
        </div>
<?php
    }
}
?>

<meta http-equiv="refresh" content="1;URL=?p=categoria">