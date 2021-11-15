<?php
include 'includes/dbconn.php';
session_start();

$order_id = uniqid();   //generate order id

 

$user_id = $_SESSION['user_id'];

date_default_timezone_set("Asia/Calcutta");
$time = date("h:i:sa");

$date = date("Y/m/d");

$amount = $_POST['amount'];


$query = "INSERT INTO `orders`(`order_id`, `user_id`, `amount`, `status`, `date`, `time`, `address`,`payment_method`) VALUES ('$order_id','$user_id','$amount','0','$date','$time','0','pending')";
if(mysqli_query($conn,$query)){


	
	$query1 = "SELECT * FROM wishlist WHERE user_id = '$user_id'";
	$result1 = mysqli_query($conn,$query1);
	while($row = mysqli_fetch_assoc($result1)){
		$food_id = $row['food_id'];
		$quantity = $row['quantity'];
		$category = $row['category'];



		$query3 = "INSERT INTO `order_details`(`id`, `order_id`, `food_id`, `quantity`,`category`) VALUES ('NULL','$order_id','$food_id','$quantity','$category')";
		 mysqli_query($conn,$query3);
		
	}
	 echo $order_id;  //data 
}
else{
	echo 0;
}

?>

