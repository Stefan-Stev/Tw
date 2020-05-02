<?php

class UserContr extends User{

    function __construct()
    {
        $this->getConexiune();
    }
    public function insertGunoaie($name,$cantitateHartie,$cantitateSticla,$cantitateMenajer)
    {
        
        if(is_int($cantitateHartie)  && is_int($cantitateSticla) && is_int($cantitateMenajer) && is_string($name))
        {

        
        $this->insertGunoaie2($name,$cantitateHartie,$cantitateSticla,$cantitateMenajer);
        echo json_encode(array("message"=>"Datele au fost stocate cu succes in baza de date"));
        }
        else
        {
            echo json_encode(array("message"=>"Datele trimise sunt incorecte."));
        } 

    }  
    public function createHartie($name,$cantitateHartie)
    {
        $this->setHartie($name,$cantitateHartie);
    } 
    public function createMenajer($name,$cantitateMenajer)
    {
        $this->setMenajer($name,$cantitateMenajer);
    }
    public function createSticla($name,$cantitateSticla)
    {
        $this->setHartie($name,$cantitateSticla);
    }
    public function deleteProblema($json)
    {
        $problema=json_decode($json,true);
        $cartier=$problema['cartiere'];
        $latitudine=(float)$problema['latitudine'];
        $longitudine=(float)$problema['longitudine'];
       
        $this->deleteProblema2($cartier,$latitudine,$longitudine);
    }
}