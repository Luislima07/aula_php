<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
<div class="alert alert-warning">
    <h3>Listar Fornecedores</h3>
</div>

<div class="col-sm-12 mb-4">
    <div class="card shadow mb-4">
        <div class="table-responsive-sm mt-4">
            <h3 class="ml-3">
                Listar Fornecedores
                <a class="btn btn-success float-right mb-3 mr-3" href="?p=fornecedor/add"><i class="bi bi-truck"></i></a>
            </h3>

            <?php
            include_once __DIR__ . '/../../controller/FornecedorController.php';
            $fornController = new FornecedorController();
            $termo = trim((string) filter_input(INPUT_GET, 'q'));
            $dados = $termo === '' ? $fornController->listar() : $fornController->pesquisar($termo);
            ?>
            <form method="get" action="index.php" class="row g-2 mx-3 mb-3">
                <input type="hidden" name="p" value="fornecedor">
                <div class="col-sm-8 col-md-6">
                    <label for="pesquisa-fornecedor" class="form-label">Pesquisar fornecedor</label>
                    <input type="search" id="pesquisa-fornecedor" name="q" class="form-control"
                        placeholder="Digite a razão social" value="<?= htmlspecialchars($termo, ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="col-auto align-self-end">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                    <?php if ($termo !== ''): ?>
                        <a href="?p=fornecedor" class="btn btn-outline-secondary">Limpar</a>
                    <?php endif; ?>
                </div>
            </form>

            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Razão Social</th>
                        <th>Cidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dados as $mostrar) {
                    ?>
                        <tr>
                            <td><?= (int) $mostrar["id"] ?></td>
                            <td><?= htmlspecialchars($mostrar["nome"], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($mostrar["cidade"], ENT_QUOTES, 'UTF-8') ?></td>
                            <td>
                                <a href="?p=fornecedor/edit&id=<?= $mostrar['id'] ?>" class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <a href="?p=fornecedor/delete&id=<?= $mostrar['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir este fornecedor?')">
                                    <i class="bi bi-trash"></i> Excluir
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    if (!$dados) {
                    ?>
                        <tr><td colspan="4" class="text-center">Nenhum fornecedor encontrado.</td></tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<a href="?p=fornecedor/add" title="Add fornecedores">Add Fornecedor</a>
