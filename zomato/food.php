
	<?php
include 'includes/navbar.php';
?>

<?php
include'includes/dbconn.php';
$food_id = $_GET["food_id"];
$query = "SELECT * FROM products WHERE food_id = '$food_id'";     //show details from data base in food.php//
$result = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($result);
$category = $result['category'];
$category1 = $result['category1'];
$category2 = $result['category2'];
?>
		<?php
;
$user_id = $_SESSION['user_id'];
$query2 = "SELECT * FROM wishlist WHERE user_id = '$user_id' AND food_id = '$food_id'  AND category = '$category'";
$result2 = mysqli_query($conn,$query2);       //first add button
$num_rows = mysqli_num_rows($result2);

?>

		<?php

$user_id = $_SESSION['user_id'];
$query3 = "SELECT * FROM wishlist WHERE user_id = '$user_id' AND food_id = '$food_id' AND category = '$category1'";
$result3 = mysqli_query($conn,$query3);       //first add button
$num_rows2 = mysqli_num_rows($result3);

?>

		<?php

$user_id = $_SESSION['user_id'];
$query4 = "SELECT * FROM wishlist WHERE user_id = '$user_id' AND food_id = '$food_id' AND category = '$category2'";
$result4 = mysqli_query($conn,$query4);       //first add button
$num_rows3 = mysqli_num_rows($result4);

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>view</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

	 	  
	 	 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.3/css/all.min.css">

	 	 <script  src="https://code.jquery.com/jquery-3.6.0.js"
  crossorigin="anonymous"></script>     <!--jquery-->

  	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" crossorigin="anonymous">
  	</script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>	
 
</head>
<style type="text/css">
	#apply{
			background-image:  linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)) ,url(https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8&w=1000&q=80);
		background-size: cover;
		background-repeat: no-repeat;
	}
</style>



<script type="text/javascript">
	$(document).ready(function(){
		$('#add-btn').click(function(){
			var food_id = '<?php echo $food_id;?>';
			var category = '<?php echo $result['category']; ?>';
			var price = '<?php echo $result['price']; ?>'
			$.ajax({
			type:'POST',
			url:'add_to_cart.php',
			data:{'food_id':food_id, 'category':category,'price':price },
			success: function (data) {
			 
			
				 
				 	 $('#add-btn').hide();
           $('#button-container1').append('<button  class="btn btn-sm btn-success float-right" style="margin-bottom: 20px;" >Added</button>');
    
				
			},
			error:function(error){

			}
       })
			})
	

  $('#add-btn2').click(function(){
  	var food_id = '<?php echo $food_id;?>';
		var category1 = '<?php echo $result['category1']; ?>';
		var price1 = '<?php echo $result['price1']; ?>'
	 $.ajax({
	 	type:'post',
	 	url:'add_to_cart2.php',
	 	data:{'food_id':food_id, 'category1':category1,'price1':price1},
	 	success:function(data){
	 		
	 	  
	 				 $('#add-btn2').hide();
	 				 $('#button-container2').append('<button   class="btn btn-sm btn-success float-right" style="margin-bottom: 20px;" >Added</button>');
          
	 	

	 	},
	 	error:function(error){

	 	}

	 })		

  })

   $('#add-btn3').click(function(){
  	var food_id = '<?php echo $food_id;?>';
		var category2 = '<?php echo $result['category2']; ?>';
		var price2 = '<?php echo $result['price2']; ?>'
	 $.ajax({
	 	type:'post',
	 	url:'add_to_cart3.php',
	 	data:{'food_id':food_id, 'category2':category2,'price2':price2},
	 	success:function(data){
	 		
	 	  
	 				 $('#add-btn3').hide();
	 				 $('#button-container3').append('<button   class="btn btn-sm btn-success float-right" style="margin-bottom: 20px;" >Added</button>');
          
	 

	 	},
	 	error:function(error){

	 	}

	 })		

  })

    })
 
   

</script> 


<body id="apply">

<div class="container">
	<div class="row" style="margin-left:175px; margin-top:30px">
<img src="<?php echo $result['bg_img'];?>" height=500px >
  </div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-8" style="border-radius: 10px;background-color:black;margin-top:40px;padding-top: 10px;width: 830px;margin-left: 40px;">
			<h2 class="text-danger"><b>
			<?php echo $result['name'];	?></b></h2>
			<b style="background-color:green;" class="text-warning"><?php echo $result['type'];?></b>
			<h6 class="text-white"><?php echo  $result['description'];?></h6>

		</div>
	
		<div class="col-md-3 " style="margin-top:40px;margin-left: 30px;">
			<div class="card text-warning" style="background-color:black;padding-left:50px;height:60px;padding-top: 10px;"><h3>Review</h3>
							<form action="submit_review.php" method="post" style="margin-top:40px" class="text-warning">

						<label>Rate the restaurant(1 to 5)  </label><br>
						<input type="number" name="rating" min="1" max="5" class="form-control"><br>
						<label>Review Title </label><br>
						<input type="text" name="title" class="form-control"><br>
						<label>Review Text</label><br>
						<textarea name="text" class="form-control"></textarea><br>
						<input type="hidden" value="<?php echo $food_id;?>" name="food_id"><br>
						<input type="submit" class="btn btn-danger btn-sm  text-white" value="Submit review" name="">

					</form>
        <?php
        $query10 = "SELECT * FROM `reviews` WHERE food_id = '$food_id' LIMIT 4 ";
        $result10 = mysqli_query($conn,$query10);
        while($row10 = mysqli_fetch_assoc($result10)){
        
        	echo'<i style="margin-top:30px" class="fas fa-user-circle  text-white">   <b class="text-danger"> '.$row10['user_name'].'</b></i>
					<span><b>'.$row10['review_title'].'</b> | <b> '.$row10['rating'].' <i class="text-white fas fa-star"></i></b></span>
					<p class="text-light">'.$row10['review_text'].'</p>
					<p class="text-light">'.$row10['review_date'].' | '.$row10['time'].'</p>';
				

        }
        ?>
			</div>
		
			
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-2 text-white" style="border-radius: 10px;height:50px;margin-top: 60px; padding-top: 10px;">
		</div>
		<div class="col-md-8" style="margin-top: 60px;">
			<div class="card-body" id="button-container1" style="background-color: black;width:560px; padding-left: 20px; height: 130px;border-radius: 10px;">
			<i class="fas fa-dot-circle text-danger" style="margin-left: -5px;"></i>
			<b style="padding-left:10px" class="text-warning"><?php echo $result['category'];?></b>
			<h6 style="padding-top:10px;padding-left: 10px;" class="text-danger">RS.<?php echo $result['price'];?></h6>
        
        <?php
        if ($num_rows == 0) {
        	// code...
        	echo '<button id ="add-btn" class=" btn btn-sm btn-warning float-right" style="margin-bottom: 20px;" >Add</button>';
        }
        else{
        	echo '<button   class="btn btn-sm btn-success float-right" style="margin-bottom: 20px;"  >Added</button>';
        }
        ?>
        	
      

			


</div>

			<div class="card-body" id="button-container2"  style="border-radius: 10px;margin-top: 20px; background-color: black; width: 560px;padding-left: 20px;height: 
			130px;">
				<i class="fas fa-dot-circle text-success " style="margin-left: -5px;"></i>
				<b style="padding-left:10px" class="text-danger"><?php echo $result['category1'];?></b>
				<h6  style="padding-top:10px;padding-left: 10px;" class="text-warning">RS.<?php echo $result['price1'];?></h6>

			 <?php
        if ($num_rows2 == 0) {
        	// code...
        	echo '<button id ="add-btn2" class=" btn btn-sm btn-warning float-right" style="margin-bottom: 20px;" >Add</button>';
        }
        else{
        	echo '<button  class="btn btn-sm btn-success float-right" style="margin-bottom: 20px;"  >Added</button>';
        }
        ?>
        	
        	
       
        
			 </div>


	   <div class="card-body" id="button-container3"  style="border-radius: 10px;margin-top: 20px; background-color: black; width: 560px;padding-left: 20px;height: 
			130px;">
				<i class="fas fa-dot-circle text-warning " style="margin-left: -5px;"></i>
				<b style="padding-left:10px" class="text-success"><?php echo $result['category2'];?></b>
				<h6  style="padding-top:10px;padding-left: 10px;" class="text-info">RS.<?php echo $result['price2'];?></h6>

		
        	  <?php
        if ($num_rows3 == 0) {
        	// code...
        	echo '<button id ="add-btn3" class=" btn btn-sm btn-warning float-right" style="margin-bottom: 20px;" >Add</button>';
        }
        else{
        	echo '<button  class="btn btn-sm btn-success float-right" style="margin-bottom: 20px;"  >Added</button>';
        }
        ?>
        	
        

			 </div> 
			 <br><br>

		  </div>
	  </div>
</div>

</body>
</html>	



	