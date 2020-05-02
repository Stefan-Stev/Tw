<?php
include '../classes/user.class.php';

class UserView extends User
{
    function __construct()
    {
        $this->getConexiune();
    }
    public function showGunoaie($name)
    {
       
        $results=$this->getGunoaie($name);
        $json=[];
         while($row=$results->fetch(PDO::FETCH_ASSOC))
         {
             extract($row);
             $json[]=(float)$sticla;
             $json[]=(float)$hartie;
             $json[]=(float)$menajer;
         }
         return $json;

    }
    public function takeAllforMonth($luna)  //aduc tate gunoaiele din luna respectiva
    {

        $results=$this->takeAll2forMonth($luna);
        $cantitateHartie=0;
        $cantitateSticla=0;
        $cantitateMenajer=0;
        while($row=$results->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $cantitateHartie=$cantitateHartie+$hartie;
            $cantitateSticla=$cantitateSticla+$sticla;
            $cantitateMenajer=$cantitateMenajer+$menajer;
        }
        $json=[];
        $json[]=(float)$cantitateHartie;
        $json[]=(float)$cantitateSticla;
        $json[]=(float)$cantitateMenajer;
        echo $cantitateHartie. ' ';
        echo $cantitateSticla. ' ';
        echo $cantitateMenajer. ' ';
        return $json;
    }
    public function showCartiere()   ///afisam cartierele
    {
        
       
       $json=[];
      $json=$this->showCartiere2();

      return $json;
    }
    public function showCartiereSimplu()
    {
        $cartiere=[];
        $cartiere=$this->showCartiereSimplu2();
        return $cartiere;
    }

    public function showSticla()   ///afisam sticla de la toate cartierele
    {
      
       $json=[];
      $json=$this->showSticla2();
          return $json;
    }
    public function showMenajer()   ///afisam gunoiul menajer din cartiere
    {
        $json=[];
      $json=$this->showMenajer2();
          return $json;
    }
  
    public function showHartie()   ///afisam cantitatea de hartie din cartiere
    {
        $json=[];
      $json=$this->showHartie2();
          return $json;
    }
    /*public function takeAll()  //voi lua toate informatiile din tabela pentru a le pune in statistica
    {
        $results=$this->takeAll2();

    }*/
    public function showHartieCartier($name)
    {
        $json=[];
        $json=$this->showHartieCartier2($name);
    
        
        return $json;
    }
    public function showSticlaCartier($name)
    {
        $json=[];
        $json=$this->showSticlaCartier2($name);
    
        
        return $json;
    }
    public function showMenajerCartier($name)
    {
        $json=[];
        $json=$this->showMenajerCartier2($name);
    
        
        return $json;
    }
    public function validate($name,$parola)  //partea de login
    {
        $results=[];
        $results=$this->validate2($name,$parola);
        if(empty($results))
        {
            return False;
        }
        else
        {
            return True;
        }
        
        
    }
    public function redareProbleme()
    {
         return json_encode($this->redareProbleme2());
        
    }
    public function cartiereOrdine()
    {
        $results=$this->cartiereOrdine2();
        $json=json_encode($results);
        return $json;
        
        
    }
}
