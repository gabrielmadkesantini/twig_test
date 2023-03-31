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

    public function __construct()
    {
        $tbl = strtolower(get_class($this));
        $tbl .= 's'; 
        $this->table = $tbl;

        $this->conex =new PDO("{$this->driver}:host={$this->host};port={$this->port};dbname={$this->dbname}",
        $this->user, $this->password);      

        echo $tbl;
    }

    public function getAll(){
        $sql = $this->conex->query("SELECT * FROM {$this->table}");
      
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOne($id){
        $sql = $this->conex->prepare("SELECT nome, email, username FROM {$this->table} WHERE id=?");
        $sql->execute([
            $id
        ]);
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

}