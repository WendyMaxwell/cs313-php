<?php

session_start();

if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

//$name = $_POST["name"];

//echo $name;

//$price =$_POST["price"];

if (isset($_POST["tomato"])) {
 	$tomato = $_POST["tomato"];
 	array_push($_SESSION['cart'], $tomato);

 	echo $_SESSION['cart'][0];

 	//foreach ($_SESSION['cart'] as $key => $value) {
 	//	echo $value;
 	//}
 } 
//echo $tomato;

//echo $_POST["name"]; 
//echo "<br>";

//$mail = $_POST["email"];

?>