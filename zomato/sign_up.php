<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST"){



    include 'includes/dbconn.php';
	$name = $_POST['user_name'];
	$email = $_POST['user_email'];
	$password = $_POST['user_password'];
	$cpassword = $_POST['user_c_password'];
	$gender = $_POST['user_gender'];
	//$exists = false;

	//check whether this email exists
	$existquery = "SELECT * FROM users WHERE email = '$email'";
	$result = mysqli_query($conn,$existquery);
	$numexistrow = mysqli_num_rows($result);
	if($numexistrow == 1){
		//$exist = true;
		$showError = "User Name Already Exist";
	}
	else {
		//$exist = false;
		if($password == $cpassword){
		$query = "INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `gender`) VALUES (NULL, '$name', '$email', '$password', '$gender')";
		$result = mysqli_query($conn,$query);
		
		if($result){
			$showAlert = true;
						session_start();

			$_SESSION['loggedin'] = 1;
			$_SESSION['user_email'] = $email;
			header("location:log_in.php");
	    }
   }
     else{
     $showError = "Password do not match";
     }
		
     }
   
 }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign up page for Zomato</title>


  <meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML, CSS, JavaScript, c, MY SQL, PHP,">      <!-- IMPORTANT META -->
  <meta name="author" content=" Sk Abdul Gaffar">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

 <link rel="stylesheet" type="text/css" href="style.css">

 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>	

</head>
<style type="text/css">
	#submit:hover{background-color: darksalmon;}
</style>

<body style="background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),url(https://www.ingredion.com/content/dam/ingredion/usca-images/food/meat/cheeseburger-bread_720x560.jpg); background-size: cover;">

	    <div class="navbar text-white bg-danger"><b>Zomato</b></div>
	    <div class="container">
		<div class="row" style="margin-top: 100px;">
			<div class="col-8 "><h1 id="name" class="text-light">Welcome to our restaurant!<br>Look nowwhere else.<br>Explore now!<br></h1>
			</div>
			<div class="col-4">
				<form action="sign_up.php" method="POST">
					<label><h2 class="text-warning">Sign in here</h2></label><br><hr>
				<?php
				if($showAlert){				
			  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>success!</strong> Now your account is created.Now Log in.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';}

			 if($showError){			
			  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Error!</strong> '.$showError.'
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';}


				?>
			

			

					<label class="text-light">Name</label><br>
					<input type="text" class="form-control" name="user_name" required><br>
					<label class="text-light">Email</label><br>
					<input type="email" name="user_email" class="form-control" required><br>
					<label class="text-light" >Password</label><br>
					<input type="password" name="user_password" class="form-control" required><br>
					<label class="text-light">Confirm Password</label><br>
					<input type="password" name="user_c_password" class="form-control" required><br>
					<label class="text-light">Gender</label><br>
					<input type="text" name="user_gender" class="form-control" required><br>
					<input type="submit" id="submit" name="" class="btn btn-danger text-white"><br><br>
					</form>
				</div>
			</div><hr>
		</div>		
					
</body>
</html>
																																																																																																																														