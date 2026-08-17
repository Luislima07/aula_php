<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<div class="alert alert-warning">
    <h3>Listar Clientes</h3>
</div>

<div class="col-sm-12 mb-4">
    <div class="card shadow mb-4">
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
                    require_once __DIR__ . "/../../model/Cliente.php";
                    require_once __DIR__ . "/../../dao/ClienteDAO.php";
                    
                    $clienteDAO = new ClienteDAO();
                    $dados = $clienteDAO->listar();
                    
                    foreach ($dados as $mostrar) {
                    ?>
                        <tr>
                            <td><?= $mostrar["id"] ?></td>
                            <td><?= $mostrar["nome"] ?></td>
                            <td><?= $mostrar["email"] ?></td>
                            <td>
                                <a href="?p=cliente/edit&id=<?= $mostrar['id'] ?>" class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>

                                <a href="?p=cliente/delete&id=<?= $mostrar['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir este cliente?')">
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

<a href="?p=cliente/add" title="Add Cliente">Add Cliente</a>