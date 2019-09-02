
<?php


require('header.php');


function showCategory($category_id=NULL){
    global $pdo;
        if($category_id){
            $stmt = $pdo->prepare("SELECT * FROM puzzles WHERE category_id =:cid");
            $stmt->bindValue(':cid',$category_id,PDO::PARAM_INT);
            $stmt->execute();
        }
        else{
            $stmt = $pdo->prepare("SELECT * FROM puzzles");
            $stmt->execute();
        }

  echo  "<div class='main-container'>";
    echo'<section class="section">';
        echo'<td><i></i></td>';
 //  echo "<div style='text-align:center'; id='my_frame'>";
 while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     $id=$row['id'];
    
    echo"<a href='puzzle.php?product_id=$id'>"  ; $filename="images/".$row['indeks'].".jpg";
     if(file_exists($filename)){
         echo"<img class='category' src=$filename>";
         echo'</a>';
     }
 }
   echo'</section> ';
    echo'</div>';
}
if(isset($_GET['cat_id'])){
    $category_id=$_GET['cat_id'];
}
else{
    $category_id=null;
}
showCategory($category_id);

require('footer.php');
  ?>
