<?php  
include 'includes/navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.3/css/all.min.css">

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" crossorigin="anonymous"></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>	

</head>
<style type="text/css">
	#bg_img{
		background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url(https://cdn.pixabay.com/photo/2020/06/11/02/12/food-5284892_640.jpg);
		background-size: cover;
		background-repeat: no-repeat;
	}
</style>
<body id="bg_img">
    
   <div class="container">
   	<div class="row">
   		
   	
   		<div class="col-md-7" style="margin-left: 300px;margin-top:80px">
   			<h1 class="text-warning"><b>Change Yourself</b></h1>


   			    <form action="change_password.php" method="POST" style="margin-top:50px">
					<label class="text-light" >Old Password</label><br>
					<input type="password" name="old" class="form-control"><br>
					<label class="text-light">New Password</label><br>
					<input type="password" name="new" class="form-control"><br>
					
					<input type="submit" id="submit" name="" class="btn btn-danger text-white " value="Change Password"><br><br>
					</form><br>
					<br><br><br><br>
   		</div>
   	</div>
   
   </div>
  

</body>
</html>