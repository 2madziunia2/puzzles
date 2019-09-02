<?php
ob_start();
require('header.php');
?>
<?php
$login=$_POST['login'];
$password=$_POST['password'];

$stmt=$pdo->prepare('INSERT INTO users(id,login,password) VALUES(null,:login,:password)');
$stmt->bindValue(':login',$login,PDO::PARAM_STR);
$stmt->bindValue(':password',$password,PDO::PARAM_STR);   
$stmt->execute();
    header('Location:index.php');
?>
<?php
require('footer.php');
?>