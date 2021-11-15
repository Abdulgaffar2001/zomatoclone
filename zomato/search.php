<?php
include "includes/navbar.php";
include 'includes/dbconn.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search in Zomato</title>


	<meta charset="UTF-8">
    <meta name="description" content="Free Web tutorials">
	<meta name="keywords" content="HTML, CSS, JavaScript, c, MY SQL, PHP,">      <!-- IMPORTANT META -->
	<meta name="author" content=" Sk Abdul Gaffar">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.3/css/all.min.css">

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" crossorigin="anonymous"></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>	

</head>
<body style="background-color:lightgray">
	
	
		<div class="container" id="img"><img src="https://b.zmtcdn.com/web_assets/8313a97515fcb0447d2d77c276532a511583262271.png" width="280px" height="70px">
        </div>
        <h1 class="text-light" style="padding-top: 25px;margin-left:260px ;">Discover the best food & drinks in Contai,WB</h1><br>
      

  </div>
  </div>
</div>
</div>
<h5 class=" my-5 bg-warning text-white" style="width: 300px;margin-left:400px; padding-left:20px;">Order Food Online in Contai </h5>

<div class="container " > 
<div class="row" style="margin-top:-35px;">

	<div class="col-md-3" >

 </div>
	
 
 <div class="col-md-6">

 
<?php

$term = $_GET['term'];
$query = "SELECT * FROM products WHERE category LIKE '%$term%' OR category1 LIKE '%$term%' OR category2 LIKE '%$term%'";
$result = mysqli_query($conn,$query); 
$count = mysqli_num_rows($result);
//echo $count;
if($count>0){
	while($row = mysqli_fetch_assoc($result)){

	


  
	echo '<div class="card " style="border-radius: 10px;background-color:ghostwhite; margin-bottom: 20px;">
			<div class="card-img" style=" height: 15px; width: 150px; "><img src= '.$row['bg_img'].' width="150px" height="150px"></div>
			<div class="card-body" style=" margin-left:130px; padding-bottom: 70px; margin-top: -20px;">
			<p style="font-size: 25px; padding-left: 10px;" class="text-danger"><b>'.$row['name'].'</b></p>
			<p style="padding-left: 10px;">'.$row['type'].'</p>
			<p style="padding-left: 10px;margin-top: -16px;"> '.$row['dl_time'].' minutes </p>
			<p style="float: right;margin-top: -110px;background-color: red;"> '.$row['rating'].' </p>
			<p style="float: right;margin-top: -70px;background-color: yellow;"> '.$row['review'].' reviews</p>
	    <a href="food.php?food_id='.$row['food_id'].'"  class="float-right btn btn-sm btn-danger">Order Now</a>
			</div>
		</div>';
	}
}	
	
else{
 echo ' <div class="error">Food Not Found</div>';
}
?>
 
 </div>

 </div>

 
 </div>
		




</body>
</html>



