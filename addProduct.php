
<?php
require('header.php');
?>

<?php
echo"<form action='doAddProduct.php' method='post'>";
echo'<div class="main-container">
       <div class="adminPanAdd" style>';
echo'<h1>DODAWANIE PUZZLI</h1>';
echo"<p>Indeks:</p><input type='text' name='indeks' required></br>";
echo"<p>Nazwa:</p><input type='text' name='name' required></br>";


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
echo"<input type='submit' value='Dodaj'>";
echo'  </div>
       </div>
';
?>
<?php
require('footer.php');
?>
