<?php 
include 'includes/navbar.php';
include 'includes/dbconn.php';

$order_id = $_GET['order_id'];
$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM orders WHERE order_id = '$order_id'";
$result = mysqli_query($conn,$query);
$result= mysqli_fetch_assoc($result);
$total = $result['amount'];

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Payment Method</title>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" crossorigin="anonymous"></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>	

</head>
<style type="text/css">
	#bg_img{
			background-image:  linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)) ,url(https://scx2.b-cdn.net/gfx/news/hires/2016/howcuttingdo.jpg);
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
					<h5><b class="text-warning">Select Options For Payment</b></h5>
					
				</div>

				<form action="complete_order.php" method="POST">
									<div class="col-md-12">
					<div class="card-body " >
					<input type="radio" name="x" value="credit card"> <b class="text-danger">Credit cart</b>
				</div>
				</div>

					<div class="col-md-12">
					<div class="card-body" style="margin:auto">
					<input type="radio" name="x" value="debit cart"> <b class="text-danger">Debit cart</b>
				</div>
				</div>
				
					<div class="col-md-12">
					<div class="card-body">
					<input type="radio" name="x" value="UPI"> <b class="text-danger">UPI</b>
				</div>
				</div>
				
					<div class="col-md-12">
					<div class="card-body">
					<input type="radio" name="x"> <b class="text-danger" value="NEFT" >NEFT</b>
				</div>
				</div>
				<input type="hidden" value="<?php echo $order_id;?>" name="order_id">
				<input type="submit" name="" style="margin-left:200px" class="btn btn-warning btn-sm" value="Pay Now">
			
				
				</form>

              

          
			</div>
		</div>


		<div class="col-md-2" ></div>

		<div class="col-md-5"style="">
			<div class="row">
				<div class="col-md-8">
					<h5><b class="text-danger">Order Details</b></h5>
					<h5 style="margin-top:50px"><b class="text-warning">Total Amount</b></h5>
					<h5><b class="text-warning">Rs. </b> <span class="text-light"><?php echo $total; ?></span></h5>

				

					
				</div>
			</div>
		</div>
	  </div>
	</div><br><br><br></div><br><br><br></div><br><br><br><br><br>
	
	

</body>
</html>
