<?php

include 'includes/dbconn.php';
session_start();

$user_id = $_SESSION['user_id'];
$food_id = $_POST['food_id'];
$category = $_POST['category'];
$sign = $_POST['sign'];
$quantity = $_POST['quantity'];


if($sign == '+'){
$query = "UPDATE wishlist SET quantity = quantity + 1 WHERE user_id = '$user_id' AND food_id = '$food_id' AND category = '$category' ";
}
else{

	$query = "UPDATE wishlist SET quantity = quantity - 1 WHERE user_id = '$user_id' AND food_id = '$food_id' AND category = '$category' ";
   

}

if ( mysqli_query($conn,$query)) {
	// code...
		
	
}


else{
	echo "Failed";
}

	//own
	$query2 = "SELECT * FROM wishlist WHERE user_id = '$user_id' AND food_id = '$food_id' AND category = '$category'";
	$result2 = mysqli_query($conn,$query2);
	$row = mysqli_fetch_assoc($result2);
	$quantity = $row['quantity']; 
	if($quantity <= 0){
		$query3 = "DELETE FROM `wishlist` WHERE user_id = '$user_id' AND food_id = '$food_id' AND category = '$category'";
		if(mysqli_query($conn,$query3)){
			echo 'success';
		}
	}	


?>

