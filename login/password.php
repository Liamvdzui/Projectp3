<?php

$password = "0000"; 
if (isset($_POST["password"]) && ($_POST["password"]=="$password")) { ?>
  <h2 style="color: green;">Het ingevoerde wachtwoord was juist, u heeft nu toegang tot Editor.</h2>
  <input type="button" onclick="window.location.href = 'http://projectp3.be/Projectp3/index_editor.php';" value="Klik hier om door te gaan"/>
<?php }
//Display this content if the provided password is wrong
else{ 
//Show the wrong password notice
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    ?>
    <h2 style="color: red;">Sorry...! Het wachtwoord was helaas fout</h2>
  <?php } ?>
  <h2 style="color white;">Vul alsjeblieft een geldig wachtwoord in om als editor in te loggen.</h2>
 <p align="center"><font color="red">
 <form id ="myForm" method="post"><p align="center">
 <input name="password" type="password" size="25" maxlength="10"><input value="Submit" type="submit"></p>
 </form>
<?php 
 } 
?>
<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<style>
    body{
        background-image: url(https://upload.dg3.com/EFTClient/Shared/images/background.jpg);
    }
</style>
</html>