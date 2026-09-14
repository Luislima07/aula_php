<?php

declare(strict_types=1);

require_once "../Php_proj_1/model/Fornecedor.php";
require_once "../Php_proj_1/dao/FornecedorDAO.php";

class FornecedorController
{
    private Fornecedor $fornecedor;
    private FornecedorDAO $dao;

    public function __construct()
    {
        $this->fornecedor = new Fornecedor();
        $this->dao = new FornecedorDAO();
    }

    public function salvar(): bool
    {
        $this->fornecedor->setNome(
            filter_input(INPUT_POST, "txtnome")
        );
        $this->fornecedor->setCidade(
            filter_input(INPUT_POST, "txtcidade")
        );

        return $this->dao->salvar($this->fornecedor);
    }

    public function alterar(): bool
    {
        $this->fornecedor->setId(
            (int) filter_input(INPUT_POST, "txtid")
        );

        $this->fornecedor->setNome(
            filter_input(INPUT_POST, "txtnome")
        );

        $this->fornecedor->setCidade(
            filter_input(INPUT_POST, "txtcidade")
        );

        return $this->dao->salvar($this->fornecedor);
    }

    public function excluir(int $id): bool
    {
        return $this->dao->excluir($id);
    }

    public function listar(): array
    {
        return $this->dao->listar();
    }

    public function buscarPorId(int $id): ?Fornecedor
    {
        return $this->dao->consultarPorID($id);
    }
}