<?php

class Dbh {
    private $host="192.168.100.7";
    private $user="root";
    private $pwd="";
    private $dbName="test";


      public function connect()
    {
        $dsn='mysql:host=' . $this->host . ';dbname=' .$this->dbName;
        $pdo=new PDO($dsn,$this->user,$this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        var_dump($pdo);
        return $pdo;
    }


}
$database=new Dbh();
$database->connect();