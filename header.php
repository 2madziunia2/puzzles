
<?php
//ob_start();
     require("functions.php"); 
     require("sessions.php"); 
     require("request.php"); 
     require("user.php"); 
    


$pdo = new PDO('mysql:host=localhost;port=3306;dbname=puzzle2','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("SET NAMES 'utf8'");

    $request = new userRequest;
    $session = new session;

menu();
   
?>
<?php
      //  $session->getUser()->geUserId();
    //if (!$session->getUser()->isAnonymous()){
      //  echo"<a href='logout.php'>wyloguj</a>";}
    
?>

    <!----------------------------------------------------------------------->
