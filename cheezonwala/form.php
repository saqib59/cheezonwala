<?php  session_start();
	require_once("inc/conn.php"); 
	if (!isset($_SESSION['cart_array'])) {
	header('location:index.php');
}

date_default_timezone_set("Asia/Karachi");
$current_time= date("Y-m-d h:i:s") . "<br>";


if(isset($_POST['submit'])){


	// $quantity=$_SESSION['quantity'];
	 
	$cart =  $_SESSION["cart_array"]; /** All products are selected  **/
	$name=$_POST['name'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$contactno=$_POST['contactno'];
	$zip_code=$_POST['zip_code'];
	$product_price=$_SESSION['cartTotal'];
	$cart_total= $_SESSION['cartTotal'];
	$details=$_SESSION['details'];
	$errors = 0;

	if( !isset($name) || empty($name)){
		$fname_err = "Kindly Enter Your Name";
		$errors += 1;   // $errors = 0;  $errors = $errors + 1;
	}
	if( !isset($email) || empty($email)){
		$email_err = "Kindly Enter Your Email";
		$errors += 1;   // $errors = 0;  $errors = $errors + 1;
	}
	if( !isset($address) || empty($address)){
		$add_err = "Kindly Enter Your Full Address";
		$errors += 1;   // $errors = 0;  $errors = $errors + 1;
	}
	if( !isset($contactno) || empty($contactno)){
		$phone_err = "Kindly Enter Your Phone Number";
		$errors += 1;   // $errors = 0;  $errors = $errors + 1;
	}

	if($errors==0){

		if( isset($cart) &&  (count($cart) > 0) ){
			$run = mysqli_query($conn,"insert into customer( c_name, c_email,c_contact_no, c_zip_code, c_address) values ( '$name', '$email','$contactno','$zip_code','$address')") or die ("query 3 incorrect");
	 			$last_id = $conn->insert_id;
	        	$_SESSION['last_id']=$last_id;

			foreach($_SESSION["cart_array"] as $each_item){
				// echo "<pre>";
				// 	var_dump($_SESSION['quantity']);
				// 	echo "</pre>";
				$item_id= $each_item['item_id'];
				//query
				$results=mysqli_query($conn,"select product_id, product_name from products where product_id ='$item_id' Limit 1");
		
				while($row=mysqli_fetch_array($results)){
					$product_id=$row["product_id"];
					$product_name=$row["product_name"];
				}
				
				$run = "insert into orders( p_name , details,price,c_id,time) values
		 			('$product_name','$details','$product_price','$last_id','$current_time')";
				if ($conn->query($run) === TRUE) {
					$last1_id = $conn->insert_id;
					$last_id= $_SESSION['last_id'];
					//loop
					$sql = mysqli_query($conn, "insert into product_order(product_id,Order_id,quantity,customer_id,product_order_time) values ('$product_id','$last1_id' ,'$each_item[quantity]','$last_id','$current_time')") or die ("query 4 incorrect");
				} 
				else {
					echo "Error: " . $run . "<br>" . $conn->error;
				}


				header("location: success_msg.php?success=1");

			}
		
		
	}  /* */

}

?>
<?php require_once('inc/top.php') ?>
</head><!--/head-->

<body>
	<?php require_once("inc/header.php"); ?>

	<section id="cart_items">
		<div class="container">
		<div class="register-req">
				<p>Please Fill your form carefully so that you get your Order correlty</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
                <div class="col-sm-1">
						<div class="order-message">

      <form></form>
                  </div></div>
				  <div class="col-sm-12 clearfix">
			   	<div class="bill-to">
							<p>Information Form</p>
							
		<form method="post" name="form1">
			<div class="form-group">
<input type="text" class="form-control" name="name" placeholder="Full Name *" pattern="^[A-Za-z -]+$" value="<?php echo isset($name)? $name: '' ?>">
<error style="color:red"><?php echo isset($fname_err)? $fname_err: ''; ?></error>
</div>
<div class="form-group">
<input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email*" value="<?php echo isset($email)? $email: '' ?>">
<error style="color:red"><?php echo isset($email_err)? $email_err: ''; ?></error>
</div>
<div class="form-group">
<input type="text" class="form-control" name="address" placeholder="Address *" value="<?php echo isset($address)? $address: '' ?>">
<error style="color:red"><?php echo isset($add_err)? $add_err: ''; ?></error>
</div>
<div class="form-group">						
<input type="text" class="form-control" name="contactno" placeholder="Enter your 11 digit mobile no" max="11" value="<?php echo isset($contactno)? $contactno: '' ?>">
<error style="color:red"><?php echo isset($phone_err)? $phone_err: ''; ?></error>
</div>
<div class="form-group">
   <input type="text" class="form-control" name="zip_code" placeholder="Zip / Postal Code *">
  </div>
  <div class="form-group">
   <input type="text" class="form-control" value="Pakistan" disabled>
</div>
 
		<br>
							<p>Your Decision</p> 													
<a class="btn btn-primary" href="cart.php?cmd=emptycart">Cancel</a>
<button type="submit" name="submit" class="btn btn-primary" >Confirm Order</button>
</div>
</form>
</div>				
</div></div>
</section> <!--/#cart_items--><br>


<?php require_once("inc/footer.php"); ?>
