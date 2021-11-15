<?php 
include "includes/dbconn.php";
session_start();
$food_id = $_POST['food_id'];
$category2 = $_POST['category2'];
$user_id = $_SESSION['user_id'];
$price2 = $_POST['price2'];

$query = "INSERT INTO `wishlist`(`id`, `user_id`, `food_id`, `category`,`price`,`quantity` ) VALUES ('null','$user_id','$food_id','$category2','$price2','1')";

if(mysqli_query($conn,$query)){
	echo "2";
}
else{
	echo "Failed";
}

?>	
