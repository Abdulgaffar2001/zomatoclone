
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Purchase Box</title>
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
     <script  src="https://code.jquery.com/jquery-3.6.0.js" 
  crossorigin="anonymous"></script>     <!--jquery-->
 	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>	


</head>

<script type="text/javascript">
	$(document).ready(function(){
		$('#coupon-btn').click(function(){
		
			var user_input = $('#coupon-code').val();
			$.ajax({
				type:'POST',
				url:'apply_coupon.php',
				data:{'user_input':user_input},
				success:function(data){
			   

         if (data === 'invalid') {

           $('#coupon-message').html("<p style='color:red'>Coupon Code Invalid !</p>");
         

         }
         else if (data === 'expired') {

         	$('#coupon-message').html("<p style='color:red'>Coupon Code expired !</p>");        //discount feature

         }else{

         	 	$('#coupon-message').html("<p style='color:green'>Coupon Applied successfully.. !</p>");
         	 	var total = $('#total_amount').text();
         	 	var discount_value = (Number(data)/100 * Number(total));
         	 	var new_total = total - discount_value;
         	  $('#total_amount').text(new_total); 
         	  $('#coupon-discount-value').text(discount_value);

         }

         $('#coupon-code').val('');//use for blank place in coupon-apply centre by click apply

				},
				error:function(error){

				}
			})
		})








		$('.place_order').click(function(){
		var amount = $('#total_amount').text();
		$.ajax({
			type:'POST',
			url:'place_order.php',
			data:{'amount':amount},
			success:function(data){
			
			 	window.location.href = "http://localhost/zomato/show_address.php?order_id=" + data;     //place order button food_id=data
			},
			error:function(error){

			}
		})
	})







 $('.change-quantity').click(function(){
 	 var quantity =	$(this).siblings('span').text();
  var price = $(this).parent().parent().siblings('.card-body').children('h6').children('span').text();
  var total = $('#total_amount').text();
var category =$(this).parent().parent().siblings('.card-body').children('b').text();
var food_id = $(this).data('id');
var sign = $(this).text();

if (sign === '+') {

$(this).siblings('span').text(Number(quantity) + 1);
$('#total_amount').text(Number(total) + Number(price));   

  $('#tax').text((Number(total) + Number(price))*0.18);
 
}
else{
	$(this).siblings('span').text(Number(quantity) - 1);
 $('#total_amount').text(Number(total) - Number(price));	       //increment and decrement using + and - button
 $('#tax').text((Number(total) - Number(price))*0.18);
 
}


$.ajax({
	type:'POST',
	url:'update_cart_quantity.php',
	data:{'food_id':food_id,'category':category,'sign':sign , 'quantity':quantity},
	success:function(data){

  
  
	},
	error:function(error){
  console.log(error);
	}
})

  
 	 


 })

	})
</script>





<style type="text/css">
	.place_order:hover{
		background-color: darkgreen;
	}
	#coupon-btn:hover{
		background-color: yellow;
	}
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
?>
</div>


  <div class="container">
  	<h2 class="text-warning" style="margin-left:60px;margin-top:30px"><b>My Wishlist Food For Buy</b></h2>
  	<div class="row" style="border: width: 600px;">
  		

  		<?php
include'includes/dbconn.php';

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM wishlist WHERE user_id = '$user_id'";
$result = mysqli_query($conn,$query);
$total = 0;


 while($row = mysqli_fetch_assoc($result)){
  $category = $row['category'];
$total = $total + ($row['price'] * $row['quantity']);



 	echo '<div class="col-md-8" style="margin-top: 60px;"> 
			<div class="card-body " style="background-color: black;width:560px; padding-left: 20px; height: 130px;border-radius: 10px;">
			<i class="fas fa-dot-circle text-danger" style="margin-left: -5px;"></i>
			<b style="padding-left:10px" class="text-warning">'.$row['category'].'</b>
			<h6 style="padding-top:10px;padding-left: 10px;" class="text-danger">RS. <span>'.$row['price'].'</span></h6>
		</div>


<div >
			<div style="margin-top:-70px;padding-right: 190px;">
			<button class="btn btn-warning btn-sm float-right change-quantity"style="margin-right: 5px;" data-id="'.$row['food_id'].'">-</button> 

			<span class="text-white float-right" style="padding-left:5px;padding-right:5px"><b>'.$row['quantity'].'</b></span>

			<button  class="btn btn-warning btn-sm float-right change-quantity" style="margin-left: 5px;" 
			data-id="'.$row['food_id'].'">+</button>
			
			
			    </div>
      	</div>
      </div>';

}
?>


     
      <div class="col-md-1" ></div>
      <div class="col-md-3" style="background-color:black;border-radius:10px;height:400px; padding-top:15px">
      	
      	<b class="text-light" >Total Price</b> <b style="padding-left: 20px;" class="text-warning" >
      	 Rs. <span id="total_amount">
      		<?php echo $total;?></span></b><br><br>
      	<b class="text-light">Discount</b><b style="padding-left: 20px;"class="text-warning">Rs. <span id="coupon-discount-value">0</span></b><br><br>
      	<b class="text-light">Totol Tax</b><b style="padding-left: 20px;" class="text-warning">Rs. <span id="tax">
      		<?php echo $total * 0.18;?>
 	      	</span></b><br><br>

      	
        <p class="text-warning "style="padding-left: 30px;">Apply Coupon code</p>
        <div id="coupon-message"></div>
        <form>
        	<input id="coupon-code" type="text" name="" class="form-control bg-dark text-light" style="border: 1px solid yellow;" placeholder="Redeem Here"><br>
      
        	</form>
        	<button id="coupon-btn" style="margin-bottom: 10px;"  class="btn btn-sm text-white" >Apply</button>
        	<button  class="form-control text-white place_order" >Place Order</button>


        	</div>

  	</div>
  </div>	<br><br><br><br><br><br><br><br>	

</body>
</html>																																																													

<!-- <button class="btn btn-danger btn-sm-block" style="margin-top:25px;margin-left:190px" class="remove_btn" ><b>Remove</b></button>																																																																																											 																																																																																																																								