<?php

define('SESSION_COOKIE','cookiepuzzle');
define('SESSION_ID_LENGHT',40);
define('SESSION_COOKIE_EXPIRE',3600);

function random_session_id(){
    $utime=time();
    $id=random_salt(40-strlen($utime)).$utime;
    return $id;  
}
function random_text($len){
    $base='QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890';
    $max= strlen($base)-1;
    $rstring ='';
    mt_srand((double)microtime()*1000000);
    while(strlen($rstring)<$len)
        $rstring.=$base[mt_rand(0,$max)];
    return $rstring;
}
function random_salt($len){
    return random_text($len);
}

function showMenu(){
    global $pdo;
    
    $stmt= $pdo->prepare("SELECT * FROM categories");
    $stmt->execute();
    
    echo'<div class="main-container">';
    echo '<section class="section" >';
    echo '<td><i></i></td>';
   
    
    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
        $name = $row['name'];
       $id= $row['id'];
   
        $filename="category-images/".$row['indeks'].".jpg";
     if(file_exists($filename)){
         echo"<a href='categories.php?cat_id=$id'>";
         echo"<img class='category' src=$filename>";
         echo'</a>';
            echo "<h3><a href='categories.php?cat_id=$id'>$name</a></h3>";
     }
       
    }
   
     echo'</section>';
        echo"</div>";
}
if(isset($_GET['cat_id'])){
    $category_id=$_GET['cat_id'];
}
else{
    $category_id=null;
}

function menu(){
     global $pdo, $session, $request;
    echo'<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, inital-scale=1">
    <meta name="description" content="Aplikiacja internetowa do układania puzzli, Sprawdź jak szybko potrafisz układać !!"/>
    <meta name="keywords" content="puzzle, gra, edukacja, rozrywka"/>
    
    <title>e-puzzel </title>


    <link rel = "stylesheet" type = "text/css"  href = "style.css"  />
    <link rel = "stylesheet" type = "text/css"  href = "fonty/css/fontello.css"  />
    <link rel="stylesheet" href="jqJigsawPuzzle.css" type="text/css"/>
    <link rel="stylesheet" href="css/jquery-ui-1.8.22.custom.css" type="text/css"/>
    
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.22.custom.min.js"></script>
        <script type="text/javascript" src="jqJigsawPuzzle.js"></script>
     <script type="text/javascript">
                jQuery(document).ready(function() {
                    jqJigsawPuzzle.createPuzzleFromImage("#my_puzzle",  
                    {piecesSize:"big"
                    });
                });
            </script>
    <script>
        
    var button = document.getElementById("start");
    function diffFunction()
    {   
        jQuery(document).ready(function() {
            var diff=jQuery("#difficulty").val();
                if(diff=="big")
                    { 
                    jQuery("div.menu").remove();
                      jQuery("div.big").remove();
                      jQuery("div.small").remove();
                      jQuery("div.normal").remove();
                      jqJigsawPuzzle.createPuzzleFromImage("#my_puzzle",  
                      {piecesSize:"big" });
                    
                    }
                else if(diff=="normal")
                    { 
                    jQuery("div.menu").remove();
                      jQuery("div.big").remove();
                      jQuery("div.small").remove();
                      jQuery("div.normal").remove();
                      jqJigsawPuzzle.createPuzzleFromImage("#my_puzzle",                         
                      {piecesSize:"normal"});
       
                    }
               else if(diff=="small")
                    { 
                    jQuery("div.menu").remove();
                      jQuery("div.big").remove();
                      jQuery("div.small").remove();
                      jQuery("div.normal").remove();
                      jqJigsawPuzzle.createPuzzleFromImage("#my_puzzle",  
                      {piecesSize:"small"});
                    }       
        });
    };
        
    </script>
    <script>
        
    var button =document.getElementById("preview");
    function opacityFunction()
    {
            jQuery(document).ready(function() {
            var opac=jQuery("div.puzzle").css("opacity")
         if(opac==0.3)
            {
                    jQuery("div.puzzle").css("opacity","1.0");
                        jQuery("div.big").hide();
                      jQuery("div.small").hide();
                      jQuery("div.normal").hide();
            }
         else
            {
                    jQuery("div.puzzle").css("opacity","0.3"); 
                  jQuery("div.big").show();
                      jQuery("div.small").show();
                      jQuery("div.normal").show();
            }       
        });
    };
        
    </script>
<!----------------------------------------------------------------------------------------------------------------------->
</head>
<body>
       <header>
        <div id="header">
            <div class="menu1">
                <ul> ';
        
                    
                   
                    if ($session->getUser()->isAnonymous()){
                  echo'<li><a href="login.php">Zaloguj się</a></li>';
                   echo '<li><a href="rej.php">Zarejestruj się</a></li>';
                    }
                  else{
                      echo'<li>Zalogowano</li>';
                     //echo'<li>Zalogowano:'.$session->getUser()->getId().'</li>';
                      echo'<li><a href="logout.php">Wyloguj się</a></li></br>';
                      if ($session->getUser()->isAdmin()){
                      echo"<li><a href='admin.php'>Panel Administratora</a></li>";
                   }}
                       
               echo' </ul>
            </div>
           <section class="logo1">
       
        <img class="logo-puzzel"  src="grafika\gotowe\logo3.gif" alt="Logo strony e-puzzel" >
       
<!-------------------------------------------------------------------------------------------------------------------------->        
    </section>
            <a href="index.html" id="logo"></a>
            <nav>
            <a href="#" id="menu"></a>
                <ol>';
                 echo   '<li><a href="index.php" class="home">Strona główna</a></li>';
                  echo  '<li><a href="showCategory.php">Kategorie</a></li>';
                   // <li><a href="#">Najlepiej oceniane</a></li>
                  //  <li><a href="#">Ranking</a></li>
                   echo '<li><a href="info.php">info</a></li>';
                     
                   echo'
                </ol>
            </nav>
        </div>

     </header>';
}
?>