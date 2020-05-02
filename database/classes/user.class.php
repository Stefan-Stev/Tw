<?php
include '../classes/dbh.class.php';

class User extends Dbh
{
    protected $conexiune;
    protected function getConexiune()
    {
        if($this->conexiune==null) //pt a impiedica sa facem noi conexiuni daca nu avem nevoie
        $this->conexiune=$this->connect();
        
    }
    protected function  getGunoaie($name)
    {
        $sql="Select * from statistica WHERE cartiere=?";
        $stmt=$this->conexiune->prepare($sql);
        $stmt->execute([$name]);
    
        return $stmt;
    }
    protected function insertGunoaie2(string $name,int $cantitateHartie,int $cantitateMenajer,int $cantitateSticla)
    {
     
       $sql="INSERT INTO statistica (cartiere,sticla,hartie,menajer,datan) values(?,?,?,?,sysdate())";
       
       
       
       $stmt=$this->conexiune->prepare($sql);
        $stmt->bindParam(1,$name,PDO::PARAM_STR,255);
        $stmt->bindParam(2,$cantitateSticla,PDO::PARAM_INT);
        $stmt->bindParam(3,$cantitateHartie,PDO::PARAM_INT);
        $stmt->bindParam(4,$cantitateMenajer,PDO::PARAM_INT);
        

       
        $stmt->execute();
       

        
    }
    protected function showCartiere2()   //aratam toate cartierele
    {
        $sql="Select distinct cartiere from statistica";
        $stmt=$this->conexiune->prepare($sql);
        $stmt->execute( );
         //$results=$stmt->fetchAll();
         $results=[];
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $results[]=(string)$cartiere;
       
        }
        return $results;

    }
    protected function showCartiereSimplu2()
    {
        $sql="Select distinct cartiere from statistica";
        $stmt=$this->conexiune->prepare($sql);
        $stmt->execute();
        $cartiere=$stmt->fetchAll();
        return $cartiere;
    }
    protected function showSticla2()  //aratam toata sticla
    {
        $sql="Select sticla from statistica";
        $stmt=$this->conexiune->prepare($sql);
        $stmt->execute( );
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $results[]=(string)$sticla;
       
        }
        return $results;
    }
    protected function showMenajer2() //aratam tot gunoiul menajer
    {
        $sql="Select menajer from statistica";
        $stmt=$this->conexiune->prepare($sql);
        $stmt->execute( );
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $results[]=(string)$menajer;
       
        }
        return $results;
    }
    protected function showHartie2() //aratam toata hartia
    {
        $sql="Select hartie from statistica";
        $stmt=$this->conexiune->prepare($sql);
        $stmt->execute( );
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $results[]=(string)$hartie;
       
        }
        return $results;
    }
    protected function showSticlaCartier2($name)   //aratam sticla pentru un cartier anume 
    {
        $sql="Select sticla from statistica where cartiere=?";
        $stmt=$this->conexiune->prepare($sql);
        $stmt->execute([$name]);
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $results[]=(string)$sticla;
       
        }
        return $results;    
    }
    protected function showMenajerCartier2($name)  //aratam gunoiul menajer pentru u cartier anume
    {
        $sql="Select menajer from statistica where cartiere=?";
        $stmt=$this->conexiune->prepare($sql);
        $stmt->execute([$name]);
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $results[]=(string)$menajer;
       
        }
        return $results;    }
    protected function showHartieCartier2($name)  //aratam hartia pentru un cartier anume
    {
        
        $sql="Select  hartie from statistica where cartiere=?";
        $stmt=$this->conexiune->prepare($sql);
        $stmt->execute([$name]);
        
        
        
        
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $results[]=(string)$hartie;
       
        }
        return $results;
    }
    protected function setSticla($name,$cantitateSticla)
    {
        $sql= " UPDATE statistica set   sticla=?  where cartiere=? ";
        $stmt=$this->conexiune->prepare($sql);
       
        $stmt->bindParam(1,$cantitateSticla,PDO::PARAM_INT);
        $stmt->bindParam(2,$name,PDO::PARAM_STR,255);
        $stmt->execute();
       

        
    }
    protected function setHartie($name,$cantitateHartie)
    {
        $sql= " UPDATE statistica set   hartie=?  where cartiere=? ";
        $stmt=$this->conexiune->prepare($sql);
       
        $stmt->bindParam(1,$cantitateHartie,PDO::PARAM_INT);
        $stmt->bindParam(2,$name,PDO::PARAM_STR,255);
        $stmt->execute();
       

        
    }
    protected function setMenajer($name,$cantitateMenajer)
    {
        $sql= " UPDATE statistica set   menajer=?  where cartiere=? ";
        $stmt=$this->conexiune->prepare($sql);
       
        $stmt->bindParam(1,$cantitateMenajer,PDO::PARAM_INT);
        $stmt->bindParam(2,$name,PDO::PARAM_STR,255);
        $stmt->execute();
       

        
    }
    protected function takeAll2forMonth($luna) //va fi apelata de functia takeALL din userView
    {
        $sql="Select * from statistica where luna=?";
        $stmt=$this->conexiune->prepare($sql);
        $stmt->bindParam(1,$luna,PDO::PARAM_STR,255);
        $stmt->execute();
       // $results=$stmt->fetchAll();
        return $stmt;
    }
    protected function validate2($name,$parola)
    {
        $sql="Select nume,prenume from cetatean where cont=? AND parola=?";
        $stmt=$this->conexiune->prepare($sql);
        $stmt->bindParam(1,$name,PDO::PARAM_STR,255);
        $stmt->bindParam(2,$parola,PDO::PARAM_STR,255);
        $stmt->execute();
        $results=[];
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $results[]=(string)$nume;
            $results[]=(string)$prenume;
        }
        return $results;
       
    }
    protected function redareProbleme2()
    {
        $sql="Select * from probleme";
        $stmt=$this->conexiune->prepare($sql);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            
            $results[]=$row;
        }
     
        return $results;
    }
    protected function deleteProblema2(string $cartier,$longitudine,$latitudine)
    {
        echo $cartier . ' ' . $latitudine . ' ' .$longitudine;
        $sql="DELETE from probleme where cartiere='$cartier' and cast(latitudine as char) <=> '$latitudine'  and cast(longitudine as char ) <=> '$longitudine'";

        $stmt=$this->conexiune->prepare($sql);
        
        var_dump($stmt);
        $stmt->execute();
    }
    protected function cartiereOrdine2()// clasamentul cartierul dupa cat de murdare sunt
    {
        $sql="SELECT cartiere FROM probleme GROUP BY cartiere ORDER BY COUNT(*) DESC";
        $stmt=$this->conexiune->prepare($sql);
        $stmt->execute();
        $results=[];
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            
            $results[]=$cartiere;
        }
        return  $results;
        
    }
}
