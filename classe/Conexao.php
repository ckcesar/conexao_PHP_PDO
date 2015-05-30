<?php


class Conexao{

    private $db;
    private $_tabela;

    private $usuario  = "root";
    private $senha    = "";
    private $host     = "localhost";
    private $database = "testes";

    private $charset = "UTF8";

    public function __construct(){
        $this->Connect();
    }

    public function Connect(){
        $conf = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$this->charset}",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        $conexao = new PDO("mysql:host=$this->host;dbname=$this->database", $this->usuario, $this->senha, $conf);
        return $conexao;
    }

    public function Executar($sql){
        $row = $this->Connect()->prepare($sql);
        return $row->execute();
    }

    public function listar($sql){
        $list = $this->Connect()->prepare($sql);
        $list->execute();
        return $list->fetchAll(PDO::FETCH_OBJ);
    }

}