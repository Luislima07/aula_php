<?php


include_once 'Conn.php';
header('Content-Type: text/html; charset=utf-8');
class Clientes
{
    private $id;
    private $nome;
    private $email;
    private $conn;


    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
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

    public function setEmail($email)
    {
        $this->email = $email;
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
            $executar->bindValue(3, mb_strtoupper($this->email));
            return $executar->execute() == 1 ? true : false;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }
    public function listar($var_id){
        try {
            $this->conn = new Conn();
            $sql = "CALL listar_clientes(?)";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $var_id);
            return $executar->execute() == 1 ? $executar->fetchAll() : false; 
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}