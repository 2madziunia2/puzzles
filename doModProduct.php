
<?php
ob_start();
require('header.php');
?>

<?php
$id=$_POST['id'];
$indeks=$_POST['indeks'];
$name=$_POST['name'];
$category_id=$_POST['category'];

$stmt=$pdo->prepare('UPDATE puzzles SET name=:name,category_id=:category_id,indeks=:indeks WHERE id=:id ');
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$stmt->bindValue(':indeks',$indeks,PDO::PARAM_STR);
$stmt->bindValue(':name',$name,PDO::PARAM_STR);   
$stmt->bindValue(':category_id',$category_id,PDO::PARAM_INT);
$stmt->execute();
    header('Location:admin.php');
?>
<?php
require('footer.php');
?>
