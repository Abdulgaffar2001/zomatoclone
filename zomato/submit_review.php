<?php
session_start();
include 'includes/dbconn.php';
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];
$food_id = $_POST['food_id'];
$rating = $_POST['rating'];
$title = $_POST['title'];
$text = $_POST['text'];
date_default_timezone_set("Asia/Calcutta");
$time = date("h:i:sa");
$date = date("Y/m/d");

$query = "INSERT INTO `reviews`(`review_id`, `user_id`, `user_name`, `food_id`, `rating`, `review_title`, `review_text`, `review_date`, `time`) VALUES ('NULL','$user_id','$user_name','$food_id','$rating','$title','$text','$date','$time')";
if(mysqli_query($conn,$query)){
	header('Location:food.php?food_id='.$food_id);
}
else{
	echo "Error! goback & try-again..";
}







?>