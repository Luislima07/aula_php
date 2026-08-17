<?php
//Exige a tipificação dos atributos e métodos
declare(strict_types=1);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Extensão PHP Getters & Setters

class Categoria
{
    //? -> pode ser null
    private ?int $id = null;
    private ?string $nome;
    private ?string $informacoes;

    public function getId() : ?int
    {
        return $this->id;
    }

    public function setId(?int $id) : self
    {
        $this->id = $id;
        return $this;
    }

    public function getNome() : string
    {
        return $this->nome;
    }

    public function setNome(string $nome) : self 
    {
        $this->nome = $nome;
        return $this;
    }

    public function getInformacoes() : string
    {
        return $this->informacoes;
    }

    public function setInformacoes(string $informacoes) : self
    {
        $this->informacoes = $informacoes;
        return $this;
    }

    
}
