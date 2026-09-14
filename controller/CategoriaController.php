<?php

declare(strict_types=1);

require_once "../Php_proj_1/model/Categoria.php";
require_once "../Php_proj_1/dao/CategoriaDAO.php";

class CategoriaController
{

    private Categoria $categoria;
    private CategoriaDAO $dao;

    public function __construct()
    {
        $this->categoria = new Categoria();
        $this->dao = new CategoriaDAO();
    }

    public function salvar(): bool
    {
        $this->categoria->setNome(
            filter_input(INPUT_POST, "txtnome")
        );
        $this->categoria->setInformacoes(
            filter_input(INPUT_POST, "txtinformacoes")
        );

        return $this->dao->salvar($this->categoria);
    }

    public function alterar(): bool
    {
        $this->categoria->setId(
            (int) filter_input(INPUT_POST, "txtid")
        );

        $this->categoria->setNome(
            filter_input(INPUT_POST, "txtnome")
        );

        $this->categoria->setInformacoes(
            filter_input(INPUT_POST, "txtinformacoes")
        );

        return $this->dao->salvar($this->categoria);
    }

    public function excluir(int $id): bool
    {
        return $this->dao->excluir($id);
    }

    public function listar(): array
    {
        return $this->dao->listar();
    }

    public function buscarPorId(int $id): ?Categoria
    {
        return $this->dao->consultarPorID($id);
    }
}