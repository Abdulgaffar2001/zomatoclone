<?php include 'includes/navbar.php';

include 'includes/dbconn.php';

$user_id = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Orders </title>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" crossorigin="anonymous"></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>	

</head>
<style type="text/css">
	#bg_img{
		background-image:  linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)) ,url(https://www.vegrecipesofindia.com/wp-content/uploads/2019/07/street-food-recipes-1a.jpg);
		background-size: cover;
		background-repeat: no-repeat;
	}
	
</style>
<body id="bg_img">
    <div class="container"> 
    	<div class="row">
    		
  <div class="col-md-12" style="margin-left: 200px; margin-top:30px;"> 


				<?php 
			$user_id = $_SESSION['user_id'];	
           $query = "SELECT * FROM orders WHERE user_id = '$user_id' LIMIT 4";
           $result = mysqli_query($conn,$query);
           while($row = mysqli_fetch_assoc($result)){
        
           $current_order_id = $row['order_id'];

           $price = $row['amount'];


echo'
<div class="card-body" style=" margin-top:10px;">
 <h6 style=" margin-left:-40px"><b class="text-warning">order_id - <span class="text-light">'.$row['order_id'].'</span> </b></h6>
   <h6 style="margin-left:250px;margin-top:-25px"><b><span class="text-warning">Date - </span><span class="text-light">'.$row['date'].'</span></b><br><b><span class="text-danger">Time - </span> <span class="text-light">'.$row['time'].'</span></b></h6>
   <h6 style="margin-left:500px;margin-top:-50px"><b><span class="text-warning">Total Amount : </span><span class="text-light">'.$price.'</span></b></h6>';

          
          $query1 = "SELECT * FROM `order_details` WHERE order_id = '$current_order_id'";
           $result1 = mysqli_query($conn,$query1);
           while($row2 = mysqli_fetch_assoc($result1)){
           	
           	$food_id = $row2['food_id'];


           	$sql = "SELECT * FROM products WHERE food_id = '$food_id' ";
           	$res = mysqli_query($conn,$sql);
           	$res = mysqli_fetch_assoc($res);
           	$name = $res['name'];



           	     	echo'
          	
			<div class="card-body " style="background-color:black;width:560px; padding-left: 20px; height: 70px;border-radius: 10px;margin-top: 50px;">
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
</div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

</body>
</html>
         		
