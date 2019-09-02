
<?php
ob_start();
require('header.php');
?>

<?php
$id=$_POST['id'];

//var_dump($id);
$stmt=$pdo->prepare('DELETE FROM puzzles WHERE id=:id ');
$stmt->bindValue(':id',$id,PDO::PARAM_INT);

$stmt->execute();
   header('Location:admin.php');
?>
<?php
require('footer.php');
?>
