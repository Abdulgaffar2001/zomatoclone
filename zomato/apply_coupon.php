<?php
include "includes/dbconn.php";
$user_input = $_POST['user_input'];

$query = "SELECT * FROM discount WHERE coupon_name = '$user_input' ";
$result = mysqli_query($conn,$query);
$num_rows = mysqli_num_rows($result);
if($num_rows == 0){
	//coupon not avilavile
	echo "invalid";
}
else{
	$result = mysqli_fetch_assoc($result);
	if($result['coupon_status'] == 'active' ){
		//send coupon value
		echo $result['coupon_value'];

	}
	else{
		//don't send value
		echo "expired";
	}
}


?>