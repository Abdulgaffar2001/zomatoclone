
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Profile </title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.3/css/all.min.css">

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" crossorigin="anonymous"></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>	
</head>
<style type="text/css">
	#bg_img{
		background-image:  linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)) ,url(https://cdn.pixabay.com/photo/2020/06/11/02/12/food-5284892_640.jpg);
		background-size: cover;
		background-repeat: no-repeat;
	}
</style>
<body id="bg_img">
	<div style="background-color: black; height:50px">
	<?php
include 'includes/navbar.php';
include 'includes/dbconn.php';
?></div>
       
    <div class="container">
    	<div class="row">
    		<div class="col-md-3 col-md-offset-3 my-4"  style="border-radius: 10px;">
    			
    				<div class="card-body" style="padding-left: 80px;border-radius: 10px;">
    					<i class=" text-white fas fa-user fa-6x"></i>
    					
    			</div>
    				<div class="card-body text-white" style="background-color:black;border-radius: 10px;"><h4><?php 
    			echo $_SESSION['name'];
    			
    			echo $_SESSION['user_id'] ;
    			 ?></h4></div>    				
    				<div class=" card-body text-warning" style="background-color:black;border-radius: 10px;padding-left: 80px;margin-top: 20px;"><b>Reviews</b></div>
    				<div class=" card-body" style=";border-radius: 10px;padding-left: 5px;margin-top: 10px;"><a href="logout.php" class="btn btn-danger btn-block"><b>Logout</b></a></div>
    				<div class=" card-body" style=";border-radius: 10px;padding-left: 5px;margin-top: 20px;"><a href="editing.php" class="btn btn-warning btn-block"><b>Edit Profile</b></a></div>
    			</div>
  <div class="col-md-6" style="margin-top:30px;"> 


				<?php 
			$user_id = $_SESSION['user_id'];	
           $query = "SELECT * FROM orders WHERE user_id = '$user_id' LIMIT 4";
           $result = mysqli_query($conn,$query);
           while($row = mysqli_fetch_assoc($result)){
        
           $current_order_id = $row['order_id'];

           $price = $row['amount'];


echo'
<div class="card-body">
 <h6><b class="text-warning">order_id - <span class="text-light">'.$row['order_id'].'</span> </b></h6>
   <h6 style="margin-left:250px;margin-top:-25px"><b><span class="text-warning">Date - </span><span class="text-light">'.$row['date'].'</span></b><br><b><span class="text-danger">Time - </span> <span class="text-light">'.$row['time'].'</span></b></h6>
   <h6 style="margin-left:440px;margin-top:-50px"><b><span class="text-warning">Total Amount : </span><span class="text-light">'.$price.'</span></b></h6>';

          
          $query1 = "SELECT * FROM `order_details` WHERE order_id = '$current_order_id'";
           $result1 = mysqli_query($conn,$query1);
           while($row2 = mysqli_fetch_assoc($result1)){
           	
           	$food_id = $row2['food_id'];


           	$sql = "SELECT * FROM products WHERE food_id = '$food_id' ";
           	$res = mysqli_query($conn,$sql);
           	$res = mysqli_fetch_assoc($res);
           	$name = $res['name'];



           	     	echo'
          	
			<div class="card-body " style="background-color:lightgray;width:530px; padding-left: 20px; height: 70px;border-radius: 10px;margin-top: 30px;">
			<i class="fas fa-dot-circle text-danger" style="margin-left: -5px;"></i>
			<b style="padding-left:10px" class="text-warning">'.$row2['category'].'</b>
			
	
      <h3 class="text-danger" style="margin-left:230px;margin-top:-30px"><b>'.$name.'</b></h3>
			<div style="margin-top:-40px;padding-right: 190px;">
			<span class="text-warning"  style="margin-left:470px;"><b>Qn.'.$row2['quantity'].'</b></span>
		   </div>
      
      </div>';
     

              

       }
       echo '
   
       </div>';

           }
  ?>
</div>


    		<div class=" col-md-3 my-4 " style="border-radius: 10px;">
    			<div class="card-body text-warning"><b>Pathetic Food</b>

    				<?php
$query10 = "SELECT * FROM `reviews` WHERE user_id = '$user_id'";
$result10 = mysqli_query($conn,$query10);
while($row10= mysqli_fetch_assoc($result10)){
 $text = $row10['review_text'];
	echo '<p class="text-light" style="padding-top:20px">'.$text.' with rating <span class="text-warning">'.$row10['rating'].'</span></p>';
}
?>

                <div class="card-body text-warning"><b>Add New Address</b>   
    				<a href="add_address.php" class="btn btn-danger btn-sm">Add</a>
    			</div>

    			</div>

   			</div>
    		
    		
    	</div><br><br><br>
    </div>

</body>
</html>																		