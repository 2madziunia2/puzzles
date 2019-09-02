<?php 
//ob_start();
require('header.php');
?>
    <!------------------------------------------------------------------------------------------------------------------->
  
    <!--------------------------------------------------------------------------------------------------------------------->
   <div class="main-container">
       <div class="login" style>
   <h1>LOGOWANIE</h1>
           <br/>
           <br/>
         <form class="loginform" action="doLogin.php" method='post'>
          <p>Login:</p> <input type="text" id="login" name='login' required>
             <br/><br/>
          <p>Hasło:</p> <input type="password" id="password" name='password' required>
             <br/><br/>
           <input type="submit" id="loin" value="Zaloguj">
        
        </div>
       </div>

    <!-------------------------------------------------------------------------------------------------------------------->
<?php require('footer.php');?>