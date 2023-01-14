<?php

$mysql = new mysqli(
  'localhost', 
  'root', 
  'root', 
  'cafe'
 );

$id = $_POST['id'];

$q = "DELETE FROM `menu` WHERE `id` = '$id'";
if (mysqli_query($mysql, $q)) 
{
  header('Location: /admin.php');
} else {
   echo "Error: ".$q."<br>".mysqli_error($mysql);
   header('Location: /admin.php');
}
mysqli_close($mysql);
?>