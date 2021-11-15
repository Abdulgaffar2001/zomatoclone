<?php include 'includes/navbar.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editing Your Profile</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" crossorigin="anonymous"></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>	

</head>
<style type="text/css">
	#submit:hover{
		background-color:darkred;
	}
	#submit2:hover{
		background-color: darkred;
	}#submit3:hover{
		background-color: darkred;
	}
	
</style>
<body style="background-color:black;">

	<div class="container">
		<div class="row">
			<div class="col-md-3"><h1 class="text-light" style="margin-left:100px;margin-top:30px"><b>Change Your Profile </b></h1></div>
			<div class="col-md-7" >
				<a href="editing_name.php" class="btn btn-warning btn-block text-dark"  id="submit" style="margin-left:100px;margin-top:30px"><b>Change Your Name</b></a>
				<a href="editing_email.php" id="submit2" class="btn btn-warning btn-block text-dark" style="margin-left:100px;margin-top:30px" class="btn btn-warning btn-block text-dark "><b>Change Your Email</b></a>
				<a href="editing_password.php"  id="submit3" style="margin-left:100px;margin-top:30px" class="btn btn-warning btn-block text-dark "><b>Change Your Password</b></a>
			</div>
			<div></div>
			
		</div>
	</div>

</body>
</html>