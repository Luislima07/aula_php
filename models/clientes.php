<?php

class Clientes
{
    private $id;
    private $nome;
    private $cidade;
    private $conn;


    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
        return $this;
    }
    public function salvar()
    {
        try {
            $this->conn = new Conn();
            $sql = 'CALL salvar_cliente(?, ?, ?)';
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $this->id);
            $executar->bindValue(2, mb_strtoupper($this->nome));
            $executar->bindValue(3, mb_strtoupper($this->cidade));
            return $executar->execute() == 1 ? true : false;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }
}