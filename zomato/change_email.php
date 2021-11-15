<?php
include 'includes/dbconn.php';
$showAlert = false;
$showError = false;
session_start();

$old_email = $_POST['old'];
$new_email = $_POST['new'];
$user_id = $_SESSION['user_id'];
$password = $_SESSION['password'];
$query = "SELECT * FROM users WHERE user_id = '$user_id' ";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
if($row['email'] == $old_email ){
	$query2 = "UPDATE `users` SET `email`='$new_email'WHERE user_id = '$user_id'";
	if(mysqli_query($conn,$query2)){
	$showAlert = true;
     }

	}
	else{
		$showError = true;
      
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Show </title>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" crossorigin="anonymous"></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
       				<?php
				if($showAlert){				
			  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>success!</strong> Your Email is Now Changed... <a href="profile.php" class="btn btn-success btn-sm">Click here to go </a>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';}

			 if($showError){			
			  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong class="text-centre";>Error!</strong> Your Email is Not Correct.Try Again !!!! <a href="editing_email.php" class="btn btn-danger btn-sm">Click here to go </a>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';}


				?>

				
</body>
</html>