<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    include 'includes/dbconn.php';
	$email = $_POST['user_email'];
	$password = $_POST['user_password'];
	$query2 = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";

		$result = mysqli_query($conn,$query2);
		$num = mysqli_num_rows($result);
		if($num == 1){
			$login = true;
			session_start();
			$_SESSION['loggedin'] = 1;
		    $_SESSION['user_email'] = $email;
		    $_SESSION['user_password'] = $password;
		
		   header("location:welcome.php");

	       while($row = mysqli_fetch_assoc($result)){
	       	 $_SESSION['user_id'] = $row['user_id'];
	       	$_SESSION['name'] = $row['name'];
	        $_SESSION['password'] = $row['password'];
	         $_SESSION['email'] = $row['email'];
	       }
	      
		}
		else{
			$showError = "Invalid User Id";			
		}
		
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Zomato login page</title>


  <meta charset="UTF-8">
  <meta name="description" content="Free Web tutorials">
  <meta name="keywords" content="HTML, CSS, JavaScript, c, MY SQL, PHP,">      <!-- IMPORTANT META -->
  <meta name="author" content=" Sk Abdul Gaffar">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

 <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body style="background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(https://image.shutterstock.com/image-photo/bowl-buddha-buckwheat-pumpkin-chicken-260nw-1259570605.jpg); background-size: cover;">


	<div class="navbar text-white bg-danger"><b>Zomato</b></div>
	<div class="container">
		<div class="row" style="margin-top: 100px;">
			<div class="col-8 text-white"><h1 id="name">Craving for food?<br>Look nowwhere else.<br>Explore now!<br></h1>
			</div>
			<div class="col-4">
				<form action="log_in.php" method="POST">
					<label><h2 class="text-danger">Login Here</h2></label><br>
		<?php
						
				if($login){				
			  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				  <strong>success!</strong> you are logged in.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';
			}

			 if($showError){			
			  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Error!</strong> '.$showError.'
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>';}
            ?>
					<hr>

					<label class="text-light">Email</label><br>
					<input type="email" name="user_email" class="form-control"><br>
					<label class="text-light" >Password</label><br>
					<input type="password" name="user_password" class="form-control"><br>
				    <input type="submit" name="" class="btn btn-warning text-light"><br><br>
					</form>
	
					

					<p class="text-light">Not have a account?<a href="sign_up.php">sign up</a></p>
				</div>
			</div>		<hr>
</div>


</body>
</html>										
<!--

<iframe width="1280" height="720" src="https://www.youtube.com/embed/mI_SHuTntdc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>