<?php

declare(strict_types=1);

require_once __DIR__ . "/../model/Conn.php";
require_once __DIR__ . "/../model/Cliente.php";

class ClienteDAO
{
    private PDO $conn;
    private string $table = "clientes";

    public function __construct()
    {
        $this->conn = new Conn();
    }

    private function texto(string $texto): string
    {
        return mb_strtoupper(trim($texto));
    }

    public function salvar(Cliente $cliente): bool
    {
        if ($cliente->getId() === null) {

            $sql = "INSERT INTO clientes
                    (nome, email)
                    VALUES
                    (?, ?)";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindValue(
                1,
                $this->texto($cliente->getNome())
            );

            $stmt->bindValue(
                2,
                $this->texto($cliente->getEmail())
            );

        } else {

            $sql = "UPDATE clientes
                       SET nome = ?,
                           email = ?
                     WHERE id = ?";

            $stmt = $this->conn->prepare($sql);

            $stmt->bindValue(
                1,
                $this->texto($cliente->getNome())
            );

            $stmt->bindValue(
                2,
                $this->texto($cliente->getEmail())
            );

            $stmt->bindValue(
                3,
                $cliente->getId()
            );
        }

        return $stmt->execute();
    }

    public function listar(): array
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY nome";

        $stmt = $this->conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function excluir(int $id): bool
    {
        $sql = "DELETE FROM {$this->table}
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(1, $id);

        return $stmt->execute();
    }

    public function consultarPorID(int $id): ?Cliente
    {
        $sql = "SELECT * FROM {$this->table}
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(1, $id);

        $stmt->execute();

        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$dados) {
            return null;
        }

        $cliente = new Cliente();

        $cliente->setId((int) $dados["id"]);
        $cliente->setNome($dados["nome"]);
        $cliente->setEmail($dados["email"]);

        return $cliente;
    }
}