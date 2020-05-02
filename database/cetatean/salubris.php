<?php
require_once 'C:/xampp/htdocs/database/classes/userview.class.php';
require_once '../classes/usercontr.class.php';
$obiect=new UserView();
$cartiere=$obiect->showCartiere();
?>

<!DOCTYPE html>
<html lang="en"><head>
<title>Salubris</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="salubrisstyle.css">
</head>
<body>
    <h2 style="text-align:center"> Salubris Account</h2>
<div class="box1">
    Introduceti datele:<br>
    Cartierul dorit:
    <select>
        <?php 
        foreach($cartiere as $cartier):?>
        <option value="<?=$cartier['cartiere'];?>"></option>
        <?php endforeach; ?>
    

            

    </select>
</div>
</body>
</html>