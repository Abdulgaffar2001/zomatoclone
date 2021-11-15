<?php 

include "includes/dbconn.php";
session_start();

$food_id = $_POST['food_id'];
$category1 = $_POST['category1'];
$user_id = $_SESSION['user_id'];
$price1 = $_POST['price1'];

$query = "INSERT INTO `wishlist`(`id`, `user_id`, `food_id`, `category`,`price`,`quantity`) VALUES ('null','$user_id','$food_id','$category1','$price1','1')";

if(mysqli_query($conn,$query)){
	echo "1";
}
else{
	echo "Failed";
}

?>	
