<?php
include '../classes/dbh.class.php';
class Test extends Dbh{
    public function getCartiere()
    {
        $sql= "Select cartiere from statistica";
        $stmt=$this->connect()->query($sql);
        while ($row=$stmt->fetch()){
                echo $row['cartiere'] . '<br>';

        }
    }
}