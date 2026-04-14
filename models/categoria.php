<?php

include_once 'Conn.php';


class Categoria
{
    private $id;
    private $nome;
    private $informacoes;
    private $conn;

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getInformacoes(){
        return $this->informacoes;
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

    public function setInformacoes($informacoes)
    {
        $this->informacoes = $informacoes;
        return $this;
    }

    public function salvar(){
        try{
            $this->conn = new Conn();
            $sql = 'CALL salvar_categoria(?, ?, ?)';
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $this->id);
            $executar->bindValue(2, mb_strtoupper($this->nome));
            $executar->bindValue(3, mb_strtoupper($this->informacoes));
            return $executar->execute() == 1 ? true : false;
        }catch (PDOException $erro){
            echo $erro->getMessage();
        }
    }
    public function listar_categoria(){
        try {
            $this->conn = new Conn();
            $sql = 'CALL listar_categoria(?)';
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $this->id);
            return $executar->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }
}
