<?php

class Dbh {
    private $host="localhost:3306";
    private $user="root";
    private $pwd="";
    private $dbName="chart";

    private $pdo;
      public function connect()
    {
      
        $dsn='mysql:host=' . $this->host . ';dbname=' .$this->dbName;
        $pdo=new PDO($dsn,$this->user,$this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

      

        return $pdo;
    }
}
