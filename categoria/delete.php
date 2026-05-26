    <?php
    $id = filter_input(INPUT_GET, 'id');

    if ($id) {
        include_once '/../models/categoria.php';
        $cat = new Categoria();
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
    <meta http-equiv="refresh" CONTENT="1;URL=?p=categoria">