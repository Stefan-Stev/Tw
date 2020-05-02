<?php
require_once '../classes/userview.class.php';
require_once '../classes/usercontr.class.php';
//$probleme=new UserView();
//$st= json_decode($probleme->redareProbleme());

/*foreach(json_decode($probleme->redareProbleme(),true) as $problema)
{
     
}*/
$obiect=new UserView();
$cartiere=[];
$cartiere=$obiect->showCartiereSimplu();
$obiect2=new UserContr();
if(isset($_GET['cantitateSticla']) && isset($_GET['cantitateHartie']) && isset($_GET['cantitateMenajer']) && isset($_GET['Cartier']))
{
   
    $obiect2->insertGunoaie($_GET['Cartier'],(int)$_GET['cantitateHartie'],(int)$_GET['cantitateSticla'],(int)$_GET['cantitateMenajer']);


}
?>