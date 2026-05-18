<div class="alert alert-warning">
    <h3>Listar Cliente</h3>
</div>

<div class="col-sm-12 mb-4">

    <div class="card shadow mb-4">
        <!-- striped é para zebrar as linhas, cada uma com uma cor-->
        <div class="table-responsive-sm mt-4">
            <h3 class="ml-3">
                Listar Clientes
                <a class="btn btn-success float-right mb-3 mr-3" href="?p=cliente/add"><i class="bi bi-database-fill-add"></i></a>
            </h3>

            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                  <tbody>
                    <?php
                    include_once "../Php_proj_1\models\clientes.php";
                    $cat = new Clientes();
                    $dados = $cat->listar(null);
                    foreach ($dados as $mostrar) {
                    ?>
                        <tr>
                            <td>
                                <?= $mostrar["id"] ?>
                            </td>
                            <td>
                                <?= $mostrar["nome"] ?>
                            </td>
                            <td>
                                <?= $mostrar["email"] ?>
                            </td>
                            <td>
                                <a
                                    href="?p=categoria/editar&id=<?= $mostrar['id'] ?>"
                                    class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>

                                <a
                                    href="?p=categoria/excluir&id=<?= $mostrar['id'] ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Deseja realmente excluir esta categoria?')">
                                    <i class="bi bi-trash"></i> Excluir
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<a href="?p=cliente/add" title="Add Cliente">Add CLiente</a>