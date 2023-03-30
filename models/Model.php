<?php

class Model
{

    private $driver = 'mysql';
    private $host = 'localhost';
    private $dbname = 'test';
    private $port = '3306';
    private $user = 'root';
    private $password = null;
    protected $table;
    protected $conex;

    public function __construct($driver, $host, $dbname, $port)
    {
        $tbl = strtolower(get_class($this));
        $tbl .= 's'; 
        $this->table = $tbl;

        $this->conex = new PDO('{$this->driver}:host={$this->localhost}
        port={$this->port}, dbname={$this->dbname},', $this->user, $this->password);        

        echo $tbl;
    }

    public function getAll(){

    }

}