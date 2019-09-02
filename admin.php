
<?php
//ob_start();
require('header.php');
?>
<?php
 echo'<div class="main-container">';
       if ($session->getUser()->isAdmin()){
  echo '<h1>PANEL ADMINISTRATORA</h1>';
     echo
          ' <br/>
           <br/>
         <form class="adminPan" action="#" mthod="post">
             
          <input type="submit" id="b1" value="Dodaj Puzzle" formaction="addProduct.php">
             <br/><br/>
         <input type="submit" id="b2" value="Usuń Puzzle" formaction="deleteProduct.php">
             <br/><br/>
           <input type="submit" id="b3" value="Modyfikuj Puzzle" formaction="modProduct.php">
        </form>
        
       </div>';
       }
else{
    echo'<div class="main-container">';
    echo '<h1>BRAK DOSTĘPU</h1>';
    echo '</div>';
    
}
?>
<?php
require('footer.php');
?>