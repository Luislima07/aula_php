<?php

include_once __DIR__ . '/Conn.php';
header('Content-Type: text/html; charset=utf-8');

//Extensão PHP Getters & Setters

class Categoria
{
    private $id;
    private $nome;
    private $informacoes;
    private $table = "categoria";
    private $conn;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function getInformacoes()
    {
        return $this->informacoes;
    }

    public function setInformacoes($informacoes)
    {
        $this->informacoes = $informacoes;
        return $this;
    }

    public function salvar()
    {
        try {

            $this->conn = new Conn();

            if ($this->id != NULL) {

                $sql = "UPDATE categoria
                    SET nome = ?, informacoes = ?
                    WHERE id = ?";

                $executar = $this->conn->prepare($sql);

                $executar->bindValue(1, mb_strtoupper($this->nome));
                $executar->bindValue(2, mb_strtoupper($this->informacoes));
                $executar->bindValue(3, $this->id);
            } else {

                $sql = "INSERT INTO categoria(nome, informacoes)
                    VALUES(?, ?)";

                $executar = $this->conn->prepare($sql);

                $executar->bindValue(1, mb_strtoupper($this->nome));
                $executar->bindValue(2, mb_strtoupper($this->informacoes));
            }

            return $executar->execute();
        } catch (PDOException $erro) {

            echo $erro->getMessage();
        }
    }
    public function listar($var_id = null)
    {
        try {

            $this->conn = new Conn();

            if ($var_id != null) {

                $sql = "SELECT * FROM categoria WHERE id = ?";

                $executar = $this->conn->prepare($sql);

                $executar->bindValue(1, $var_id);
            } else {

                $sql = "SELECT * FROM categoria";

                $executar = $this->conn->prepare($sql);
            }

            $executar->execute();

            return $executar->fetchAll();
        } catch (PDOException $error) {

            echo $error->getMessage();
        }
    }
    public function deletar()
    {
        try {
            $this->conn = new Conn();
            $sql = "DELETE FROM {$this->table} where id = ?";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $this->id);
            return $executar->execute() == 1 ? true : false;
        } catch (PDOException $erro) {

            echo $erro->getMessage();
        }
    }

    public function inserir()
    {
        try {
            $this->conn = new Conn();
            $sql = "INSERT INTO {$this->table} VALUES (?, ?, ?)";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $this->id);
            $executar->bindValue(2, mb_strtoupper($this->nome));
            $executar->bindValue(3, mb_strtoupper($this->informacoes));
            return $executar->execute() == 1 ? true : false;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function alterar()
    {
        try {
            $this->conn = new Conn();
            $sql = "UPDATE {$this->table} 
                    SET nome = ?, informacoes = ? 
                    WHERE id = ?";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, mb_strtoupper($this->nome));
            $executar->bindValue(2, mb_strtoupper($this->informacoes));
            $executar->bindValue(3, $this->id);
            return $executar->execute() == 1 ? true : false;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function listarSemProcedure()
    {
        try {
            $this->conn = new Conn();
            $sql = "SELECT * FROM {$this->table} ORDER BY nome";
            $executar = $this->conn->prepare($sql);
            return $executar->execute() == 1 ? $executar->fetchAll() : false;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function consultarPorID()
    {
        try {
            $this->conn = new Conn();
            $sql = "SELECT * FROM {$this->table} WHERE id = ?";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $this->id);
            return $executar->execute() == 1 ? $executar->fetch() : false;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }

    public function crudPhp($opcao)
    {
        try {
            $this->conn = new Conn();
            switch ($opcao) {
                case 'I':
                    $sql = "INSERT INTO {$this->table}
                        (nome, informacoes)
                        VALUES (?, ?)";
                    $executar = $this->conn->prepare($sql);
                    $executar->bindValue(1, mb_strtoupper($this->nome));
                    $executar->bindValue(2, mb_strtoupper($this->informacoes));
                    break;

                case 'A':
                    $sql = "UPDATE {$this->table}
                           SET nome = ?,
                               informacoes = ?
                         WHERE id = ?";
                    $executar = $this->conn->prepare($sql);
                    $executar->bindValue(1, mb_strtoupper($this->nome));
                    $executar->bindValue(2, mb_strtoupper($this->informacoes));
                    $executar->bindValue(3, $this->id);
                    break;

                case 'E':
                    $sql = "DELETE FROM {$this->table}
                        WHERE id = ?";
                    $executar = $this->conn->prepare($sql);
                    $executar->bindValue(1, $this->id);
                    break;

                default:
                    return false;
            }

            return $executar->execute() == 1 ? true : false;
        } catch (PDOException $exc) {

            echo $exc->getMessage();
        }
    }
}
