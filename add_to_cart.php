<?php
	$mysql = new mysqli(
		'localhost', 
		'root', 
		'root', 
		'cafe'
	);
$id = $_POST['buy'];
$q = "INSERT INTO `cart` (`product_id`) VALUES ('$id')";
if (mysqli_query($mysql, $q)) {
  header('Location: /');
}
else {
   echo "Error: ".$q."<br>".mysqli_error($mysql);
   header('Location: /');
}
mysqli_close($mysql);
?>