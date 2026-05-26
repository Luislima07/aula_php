    <?php
    $id = filter_input(INPUT_GET, 'id');

    if ($id) {
        include_once 'C:\Users\gl401\Downloads\usbwebserver\root\Php_proj_1\models\clientes.php';
        $cat = new Clientes();
        $cat->setId($id);

        if ($cat->deletar()) {
    ?>
            <div class="alert alert-primary" role="alert">
                Excluído com sucesso
            </div>
    <?php
        }
    }
    ?>
    <meta http-equiv="refresh" CONTENT="1;URL=?p=cliente">