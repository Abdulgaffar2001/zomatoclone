<?php 

include "includes/dbconn.php";
session_start();

$food_id = $_POST['food_id'];
$category = $_POST['category'];
$user_id = $_SESSION['user_id'];
$price = $_POST['price'];
$query = "INSERT INTO `wishlist`(`id`, `user_id`, `food_id`, `category`,`price`,`quantity`) VALUES ('null','$user_id','$food_id','$category','$price','1')";

if(mysqli_query($conn,$query)){
	echo "success";
}
else{
	echo "Failed";
}

?>	

