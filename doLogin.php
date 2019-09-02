<?php
ob_start();
require('header.php');
?>
<?php
if ($session->getUser()->isAnonymous()){
    $result =user::checkPasswords($_POST['login'],$_POST['password']);
    
    if($result instanceof user){
        $session->updateSession($result);
       // header("location:admin.php");
         
       if($session->getUser()->isAdmin()){
        //if($_POST['login']=='admin'){
         $session->updateSession($result);
          header("Location:admin.php");
           
        }
        else{
        //zalogowany
        $session->updateSession($result);
        
           
           
          header("location:index.php");
        }
    }
    else{
        
       echo"<h1>Podałeś Nieprawidłowe dane</h1>";
       header("Location:login.php");
       
    }
    
}
 ?>
<?php
require('footer.php');
?>