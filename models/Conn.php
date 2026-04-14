<?php

class Conn extends PDO
{

    private static $instancia;
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "usbw";
    private $db = "bd_backend";

    public function __construct()
    {
        parent::__construct("mysql:host=$this->host;dbname=$this->db", "$this->usuario", "$this->senha");
    }

    public static function getInstance()
    {
        // Se o a instancia não existe eu faço uma
        if (!isset(self::$instancia)) {
            try {
                self::$instancia = new Conn;
            } catch (Exception $e) {
                echo 'Erro ao conectar';
                exit();
            }
        }
        // Se já existe instancia na memória eu retorno ela
        return self::$instancia;
    }
}

