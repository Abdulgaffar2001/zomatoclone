<?php include 'includes/navbar.php';
$user_id = $_SESSION['user_id'];
$order_id = $_GET['order_id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>place Order </title>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" crossorigin="anonymous"></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>	

</head>
<style type="text/css">
	#bg_img{
			background-image:  linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)) ,url(https://images.indianexpress.com/2017/07/biryani1.jpg );
		background-size: cover;
		background-repeat: no-repeat;
	}
</style>
<body id="bg_img">
<div class="container" style="margin-top:50px;">
	<div class="row">
		<div class="col-md-5" style="width: 900px;">
			<div class="row">
				<div class="col-md-12">
					<h5><b class="text-warning">Select Address</b></h5>
					
				</div>
               <?php
               include 'includes/dbconn.php';
               $query = "SELECT * FROM address WHERE user_id = '$user_id'";
               $result = mysqli_query($conn,$query);
               $counter = 0;
               while($row = mysqli_fetch_assoc($result)){
               	echo '<div class="col-md-12 mt-3">
              	
              		<div class="card-body text-white" style="background-color:black;border-radius: 10px;">
              			<p><b class="text-danger">'.$row['details'].'</b><br><br>
              				<b>Ph - </b>'.$row['phone'] .'<br><br>
              				<b class="text-warning">Pin Code - </b> <span class="text-white">'.$row['pincode'].'</span><br>
              			</p>
              			<a href="update_address.php?address_id='.$row['address_id'].'& order_id='.$order_id.'" class="btn btn-danger btn-sm text-white float-right" style="margin-top: -30px;">Select this address</a>
              		</div>
              		
              	
              </div> ';
              $counter ++;
               }
               if($counter == 0){
               	echo '<div class="col-md-12"> <b class="text-danger">You have not any Selected address</b> </div>';
               }
               ?>

          
			</div>
		</div>


		<div class="col-md-2" ></div>

		<div class="col-md-5"style="">
			<div class="row">
				<div class="col-md-8">
					<h5><b class="text-danger">Add New Address</b></h5>
					<form action="add_new_address.php" method="post" style="margin-top:40px" class="text-warning">

						<label>Address</label><br>
						<textarea name="details" class="form-control"></textarea><br>						
						<label>phone no.</label><br>
						<input type="text" class="form-control" required name="phone"><br>
						<label>Pincode</label><br>
						<input type="text" class="form-control" required name="pincode"><br>
						<input type="hidden" value="<?php echo $order_id;?>" name="order_id">
						<input type="submit" class="btn btn-warning  text-white" value="Pay Now" name="">

					</form>
					
				</div>
			</div>
		</div>
	  </div>
	</div><br><br><br></div><br><br><br></div><br><br><br>
	
	

</body>
</html>

