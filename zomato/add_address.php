<?php include 'includes/navbar.php';?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Adddress</title>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" crossorigin="anonymous"></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>	

</head>
<style type="text/css">
	#bg_img{
			background-image:  linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)) ,url(https://img.freepik.com/free-photo/concept-indian-cuisine-baked-chicken-wings-legs-honey-mustard-sauce-serving-dishes-restaurant-black-plate-indian-spices-wooden-table-background-image_127425-18.jpg?size=626&ext=jpg);
		background-size: cover;
		background-repeat: no-repeat;
	}
</style>
<body id="bg_img">
			<div class="container"style="margin-top: 60px;width: 400px;">
			<div class="row">
				<div class="col-md-8" style="width:600px">
					<h5><b class="text-danger">Add New Address</b></h5>
					<form action="address.php" method="post" style="margin-top:40px" class="text-warning">

						<label>Address</label><br>
						<textarea name="details" class="form-control"></textarea><br>						
						<label>phone no.</label><br>
						<input type="text" class="form-control" required name="phone"><br>
						<label>Pincode</label><br>
						<input type="text" class="form-control" required name="pincode"><br>
						<input type="hidden" value="<?php echo $order_id;?>" name="order_id">
						<input type="submit" class="btn btn-warning  text-white" value="Add" name="">

					</form>
					
				</div>
			</div><br><br><br><br>
		</div>

</body>
</html>