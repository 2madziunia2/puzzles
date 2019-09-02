
<?php
require('header.php');
?>

<?php

echo"<form action='doModProduct.php' method='post'>";
echo'<div class="main-container">
       <div class="adminPanAdd" style>';
echo'<h1>MODYFIKOWANIE PUZZLI</h1>';
    $stmt = $pdo->prepare("SELECT * FROM puzzles ");
$stmt->execute();
$rows= $stmt->fetchAll(PDO::FETCH_ASSOC);
echo"<p>Puzzle:</p><select name='id' required>";

foreach($rows as $puzzles){
    $id=$puzzles['id'];
    $name=$puzzles['name'];
    echo"<option value='$id'>$name</option>";
    
}

echo"</select></br>";
echo"<p>Indeks:</p><input type='text' name='indeks' required></br>";
echo"<p>Nazwa:</p><input type='text' name='name'></brrequired>";


$stmt = $pdo->prepare("SELECT * FROM categories");
$stmt->execute();

$rows= $stmt->fetchAll(PDO::FETCH_ASSOC);
echo"<p>Kategoria:</p><select name='category' required>";

foreach($rows as $category){
    $id=$category['id'];
    $name=$category['name'];
    echo"<option value='$id'>$name</option>";
    
}
echo"</select>";
echo'</br></br>';
echo"<input type='submit' value='Modyfikuj'>";
echo'  </div>
       </div>
';
?>
<?php
require('footer.php');
?>
