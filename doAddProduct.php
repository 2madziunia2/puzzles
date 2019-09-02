
<?php
ob_start();
require('header.php');
?>

<?php

$indeks=$_POST['indeks'];
$name=$_POST['name'];
$category_id=$_POST['category'];

$stmt=$pdo->prepare('INSERT INTO puzzles(id,name,category_id,indeks) VALUES(null,:name,:category_id,:indeks)');
$stmt->bindValue(':indeks',$indeks,PDO::PARAM_INT);
$stmt->bindValue(':name',$name,PDO::PARAM_STR);   
$stmt->bindValue(':category_id',$category_id,PDO::PARAM_INT);
$stmt->execute();
    header('Location:admin.php');
?>
<?php
require('footer.php');
?>
