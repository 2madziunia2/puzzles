<html lang="pl">
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
            var diff=jQuery('#difficulty').val();
                if(diff=="big")
                    { 
                      jQuery('div.big').remove();
                      jQuery('div.small').remove();
                      jQuery('div.normal').remove();
                      jqJigsawPuzzle.createPuzzleFromImage("#my_puzzle",  
                      {piecesSize:"big" });
                    
                    }
                else if(diff=="normal")
                    {   
                      jQuery('div.big').remove();
                      jQuery('div.small').remove();
                      jQuery('div.normal').remove();
                      jqJigsawPuzzle.createPuzzleFromImage("#my_puzzle",                         
                      {piecesSize:"normal"});
       
                    }
               else if(diff=="small")
                    { 
                      jQuery('div.big').remove();
                      jQuery('div.small').remove();
                      jQuery('div.normal').remove();
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
            var opac=jQuery('div.puzzle').css("opacity")
         if(opac==0.3)
            {
                    jQuery('div.puzzle').css("opacity","0.0");
            }
         else
            {
                    jQuery('div.puzzle').css("opacity","0.3");            
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
                <ul>
                   
                    <li><a href="login.php">Zaloguj się</a></li>
                    <li><a href="rejestracja.php">Zarejestruj się</a></li>
                </ul>
            </div>
           <section class="logo1">
       
        <img class="logo-puzzel"  src="grafika\gotowe\logo3.gif" alt="Logo strony e-puzzel" >
       
<!-------------------------------------------------------------------------------------------------------------------------->        
    </section>
            <a href="index.html" id="logo"></a>
            <nav>
            <a href="#" id="menu"></a>
                <ol>
                    <li><a href="index.php" class="home">Strona główna</a></li>
                    <li><a href="showCategory.php">Kategorie</a></li>
                    <li><a href="#">Najlepiej oceniane</a></li>
                    <li><a href="#">Ranking</a></li>
                    <li><a href="info.php">info</a></li>
                   
                </ol>
            </nav>
        </div>

     </header>
    <!----------------------------------------------------------------------->
