<?php
echo " Datele introduse au fost executate";
require_once '../classes/userview.class.php';
require_once '../classes/usercontr.class.php';
if(isset($_GET['q'])){
$stringProblema=$_GET['q'];
$vector=array();
$token=strtok($stringProblema, " ");
while($token!==false)
{
array_push($vector,$token);
$token=strtok(" ");
}
$toReturn['cartiere']=$vector[0];
$toReturn['latitudine']=$vector[1];
$toReturn['longitudine']=$vector[2];
 $obiect=new UserContr();
 $obiect->deleteProblema(json_encode($toReturn));
}
?>