
<?php 
require('header.php');
?>

<?php
function showProduct($id){
    global $pdo;
    
    $stmt =$pdo->prepare("SELECT * FROM puzzles WHERE id=:id");
    $stmt->bindValue(':id',$id,PDO::PARAM_INT);
    $stmt->execute();
   
  echo'<div class="main-container">';
    echo'<div style="text-align:center;" id="my_frame">';
    while($row =$stmt->fetch(PDO::FETCH_ASSOC)){
       
        $index=$row['indeks'];
        $id=$row['id'];
        $name = $row['name'];
        $filename="images/".$row['indeks'].".jpg";
     if(file_exists($filename)){
      
         echo"<img id='my_puzzle' src=$filename>";
        }
    }
    echo'</div>';
       echo'<br/><br/>';
  echo  '<form class="puzzleform" action="index.php" method="get" name="formularz">
        <p>
            <label for="difficulty">Poziom Trudności</label>
                <select id="difficulty">
            <option value="big" selected="selected">łatwy</option>
            <option value="normal" >średni</option>
            <option value="small" >trudny</option>
                </select>
            </p>
            <input type="button" id="start" value="Ułóż" onclick="diffFunction()">
            <input type="button" id="preview" value="Podgląd" onclick="opacityFunction()" >
        </form>
       
       </div>';
}
if(isset($_GET['product_id'])){
    showProduct($_GET['product_id']);
    
}

?>

<?php 
require('footer.php');
?>