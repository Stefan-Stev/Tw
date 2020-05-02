<!DOCTYPE html>
<html lang="en">
<head>
<title>Login </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styleCetatean.css">
</head>
<body   >


<div class="container">
  <form method="POST">
    <div class="row">
      <h2 style="text-align:center">Login Into Your Garbage Monitor App</h2>
     

     

      <div class="col">
        

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="Login" value="Login">
      </div>
      
    </div>
  </form>
</div>

<div class="bottom-container">
  <div class="row">
    <div class="col">
      <a href="#" style="color:white" class="btn">Sign up</a>
    </div>
    <div class="col">
      <a href="#" style="color:white" class="btn">Forgot password?</a>
    </div>
  </div>
</div>
<?php
require_once '../classes/userview.class.php';
require_once '../classes/usercontr.class.php';
if(isset($_POST['Login']) && isset($_POST['username']) && isset($_POST['password']))
{
    $nume=$_POST['username'];
    $parola=$_POST['password'];
    $cartierObj=new UserView();
    $ok=$cartierObj->validate($nume,$parola);
    if($ok==1)
    {
            header('Location:form.php');
    }
    else
    {
        echo 'Datele trimise sunt incorecte';
    }
}
?>
</body>
</html>