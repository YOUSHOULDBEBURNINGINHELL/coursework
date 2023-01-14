<?php

$mysql = new mysqli(
  'localhost', 
  'root', 
  'root', 
  'cafe'
 );
$price = filter_var(trim($_POST['price']), 
 FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), 
 FILTER_SANITIZE_STRING);
$description = filter_var(trim($_POST['description']), 
 FILTER_SANITIZE_STRING);
$id = $_POST['id'];



$q = "UPDATE `menu` SET `price` = '$price', `name` = '$name', `description` = '$description' WHERE `id` = '$id'";
if (mysqli_query($mysql, $q)) 
{
  header('Location: /admin.php');
} else {
   echo "Error: ".$q."<br>".mysqli_error($mysql);
   header('Location: /admin.php');
}
mysqli_close($mysql);
?>