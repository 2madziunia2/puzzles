<?php

require('header.php');
?>
<?php
   echo'<div class="main-container">
       <div class="login" style>
   <h1>REJESTRACJA</h1>
           <h1>Podaj dane:</h1>
           <br/>
           <br/>';
    echo   '  <form class="loginform" action="doRej.php "method="post">';
  //echo       ' <p>Email:</p> <input type="email" id="newemail" name="email" required>
           echo  '<br/><br/>';
         echo' <p>Login:</p> <input type="text" id="newlogin" name="login" required >
             <br/><br/>
          <p>Hasło:</p> <input type="password" id="newpassword" name="password" required>
             <br/><br/>
           <input type="submit" id="singin" value="dołącz" >
        
        </div>
       </div>';
?>
<?php
require('footer.php');
?>