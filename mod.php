
<?php
require('header.php');
?>

<?php

echo"<form action='doDeleteProduct.php' method='post'>";
echo'<div class="main-container">
       <div class="adminPanAdd" style>';
echo'<h1>MODYFIKOWANIE PUZZLI</h1>';
$stmt = $pdo->prepare("SELECT * FROM puzzles");
$stmt->execute();

$rows= $stmt->fetchAll(PDO::FETCH_ASSOC);
echo"Puzzle:<select name='id'>";

foreach($rows as $puzzles){
    $id=$puzzles['id'];
    $name=$puzzles['name'];
    echo"<option value='$id'>$name</option>";
    
}

echo"</select>";
echo"<input type='submit' value='Usuń'>";

?>
<?php
require('footer.php');
?>
