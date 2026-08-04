<?php

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id) {

    include_once 'C:\Users\gl401\Downloads\usbwebserver\root\Php_proj_1\models\categoria.php';

    $cat = new Categoria();
    $cat->setId($id);

    if ($cat->crudPhp("E")) {
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