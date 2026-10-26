<?php

declare(strict_types=1);

require_once "../Php_proj_1/model/Cliente.php";
require_once "../Php_proj_1/dao/ClienteDAO.php";

class ClienteController
{
    private Cliente $cliente;
    private ClienteDAO $dao;

    public function __construct()
    {
        $this->cliente = new Cliente();
        $this->dao = new ClienteDAO();
    }

    public function salvar(): bool
    {
        $this->cliente->setNome(
            filter_input(INPUT_POST, "txtnome")
        );
        $this->cliente->setEmail(
            filter_input(INPUT_POST, "txtemail")
        );
        return $this->dao->salvar($this->cliente);
    }

    public function alterar(): bool
    {
        $this->cliente->setId(
            (int) filter_input(INPUT_POST, "txtid")
        );

        $this->cliente->setNome(
            filter_input(INPUT_POST, "txtnome")
        );

        $this->cliente->setEmail(
            filter_input(INPUT_POST, "txtemail")
        );

        return $this->dao->salvar($this->cliente);
    }

    public function excluir(int $id): bool
    {
        return $this->dao->excluir($id);
    }

    public function listar(): array
    {
        return $this->dao->listar();
    }

    public function pesquisar(string $nome): array
    {
        return $this->dao->pesquisar($nome);
    }

    public function buscarPorId(int $id): ?Cliente
    {
        return $this->dao->consultarPorID($id);
    }
}
