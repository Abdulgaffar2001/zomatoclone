<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

	<meta name="keywords" content="HTML, CSS, JavaScript, c, MY SQL, PHP,">      <!-- IMPORTANT META -->
	<meta name="author" content=" Sk Abdul Gaffar">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.3/css/all.min.css">

	
</head>
<style type="text/css">
	.text-danger h2{
		display: inline-block;
		margin-top: -15px;

</style>
<body>
  		<div  id="bg_img">

		<div class="navbar row " id="navbar">
			<div class="col-md-2 text-danger">
				
			<!--	<i class="fa-2x text-danger fas fa-bars" ></i> -->
	<h2><b style="margin-left: -12px;" ><a href="welcome.php" style="text-decoration: none;" class="text-danger"> zomato</a></b></h2></div>

			<div class="col-md-6" >
			  
			</div>


		
		  	<div class="col-md-4"  >

  <div class="dropdown">
  
    <i class="fas fa-user-circle fa-2x text-danger" style="margin-left:300px" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"></i>
  
  <ul class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton1">
    <li><b style="padding-left:10px" class="text-danger"><?php echo $_SESSION['name']?></b></li><hr>
    <li><a class="dropdown-item text-warning" href="welcome.php">Home</a></li>
    <li><a class="dropdown-item text-warning" href="profile.php">My Profile</a></li>
    <li><a class="dropdown-item text-warning" href="my_wishlist.php">My Wishlist</a></li>
    <li><a class="dropdown-item text-warning" href="my_order.php">My Orders</a></li>
    <li><a class="dropdown-item text-warning" href="logout.php">Log Out</a></li>
  </ul>
</div>
		  	
      <a href="my_wishlist.php"><i class="fa-2x fas fa-shopping-cart float-right text-danger" style="margin-top:-35px"></i></a>   

      
             
		    </div>
</body>
</html>		