<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>
<div class="alert alert-warning">
    <h3>Listar categorias</h3>
</div>

<div class="col-sm-12 mb-4">
    <div class="card shadow mb-4">
        <div class="table-responsive-sm mt-4">
            <h3 class="ml-3">
                Listar Categorias
                <a class="btn btn-success float-right mb-3 mr-3" href="?p=categoria/add"><i class="bi bi-database-fill-add"></i></a>
            </h3>

            <?php
            include_once __DIR__ . '/../../controller/CategoriaController.php';
            $catController = new CategoriaController();
            $termo = trim((string) filter_input(INPUT_GET, 'q'));
            $dados = $termo === '' ? $catController->listar() : $catController->pesquisar($termo);
            ?>
            <form method="get" action="index.php" class="row g-2 mx-3 mb-3">
                <input type="hidden" name="p" value="categoria">
                <div class="col-sm-8 col-md-6">
                    <label for="pesquisa-categoria" class="form-label">Pesquisar categoria</label>
                    <input type="search" id="pesquisa-categoria" name="q" class="form-control"
                        placeholder="Digite o nome da categoria" value="<?= htmlspecialchars($termo, ENT_QUOTES, 'UTF-8') ?>">
                </div>
                <div class="col-auto align-self-end">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                    <?php if ($termo !== ''): ?>
                        <a href="?p=categoria" class="btn btn-outline-secondary">Limpar</a>
                    <?php endif; ?>
                </div>
            </form>

            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Informações</th>
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
                            <td><?= htmlspecialchars($mostrar["informacoes"], ENT_QUOTES, 'UTF-8') ?></td>
                            <td>
                                <a href="?p=categoria/edit&id=<?= $mostrar['id'] ?>" class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <a href="?p=categoria/delete&id=<?= $mostrar['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir esta categoria?')">
                                    <i class="bi bi-trash"></i> Excluir
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    if (!$dados) {
                    ?>
                        <tr><td colspan="4" class="text-center">Nenhuma categoria encontrada.</td></tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<a href="?p=categoria/add" title="Add categorias">Add Categoria</a>
