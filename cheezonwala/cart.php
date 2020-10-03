<?php //adding somthing to cart
session_start();
require_once("inc/conn.php");
if(isset($_POST['submit'])){
$product_id =$_POST['search_text'];
$wasFound=false;
$i=0;
// If the cart session variable is not set or cart array is empty
if(!isset($_SESSION['cart_array']) || count($_SESSION['cart_array'])<1)
{
     $_SESSION['cart_array']=array(0=> array("item_id"=>$product_id,
	 "quantity" =>1));
	 
}
else
{   // RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
	foreach($_SESSION["cart_array"]as $each_item)
	{
	$i++;
	while(list($key, $value)= each($each_item)){
	if($key=="item_id" && $value == $product_id)
	{
		array_splice($_SESSION["cart_array"], $i-1,1,array(array("item_id" =>$product_id, "quantity" => $each_item['quantity']+1)));
		$wasFound=true;
}}}
if($wasFound == false)
{
	array_push($_SESSION["cart_array"], array("item_id"=>$product_id, "quantity" =>1));
}
}
}
?>
<?php ///////////////////////////////////////////////////////////////////
//       Section 2 (if user chooses to empty their shopping cart)
////////////////////////////////////////////////////////////////////
 
if(isset($_POST['success'])) {

if(isset($_POST['cmd']) && $_POST['cmd']=="emptycart")
{
	unset($_SESSION["cart_array"]);
}}
?>
<?php //Cancel cart
if(isset($_GET['cmd']) && $_GET['cmd']=="emptycart")
{
	unset($_SESSION["cart_array"]);
}
?>
<!-- //ADAM CARTT -->





<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 3 (if user chooses to adjust item quantity)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "" && isset($_SESSION['quantity'])) {
    // execute some code
	$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = preg_replace('#[^0-9]#i', '', $quantity); // filter everything but numbers
	if ($quantity >= 100) { $quantity = 99; }
	if ($quantity < 1) { $quantity = 1; }
	if ($quantity == "") { $quantity = 1; }
	$i = 0;
	foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $item_to_adjust) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("item_id" => $item_to_adjust, "quantity" => $quantity)));
				  } // close if condition
		      } // close while loop
	} // close foreach loop
	//$_SESSION['quantity'];
	// $results=mysqli_query($conn,"select quantity from orders where order_id ='$item_id' Limit 1");
	// 	while ($row = mysqli_fetch_array($results))
	// 	 {
	// 	$order_id=$row["product_id"];
	// 	$quantity1 =$row["quantity"];

	// 	}
}
?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 4 (if user wants to remove an item from cart)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
    // Access the array and run code to remove that array index
 	$key_to_remove = $_POST['index_to_remove'];
	if (count($_SESSION["cart_array"]) <= 1) {
		unset($_SESSION["cart_array"]);
	} else {
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
	}
}
?>
<?php 

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 5  (render the cart for the user to view on the page)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$cartOutput = "";
$cartTotal = "";
$pp_checkout_btn = '';
$product_id_array = '';
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
    $cartOutput = "<h2 align='center'>Your shopping cart is empty</h2>";
} else {
	$quantity_arr[] = array();
	// Start the For Each loop
	$i = 0; 
    foreach ($_SESSION["cart_array"] as $each_item) { 
    	

		$item_id = $each_item['item_id'];
		$results=mysqli_query($conn,"select product_id, product_name,image,price,details from products where product_id ='$item_id' Limit 1");
		while ($row = mysqli_fetch_array($results))
		 {
		$product_id=$row["product_id"];
		$product_name=$row["product_name"];
		$image=$row["image"];
        $price=$row["price"];
		$details=$row["details"];
		}
		$pricetotal = ($price) * ($each_item['quantity']);
		$cartTotal = ((int)$pricetotal + (int)$cartTotal);
		// Dynamic Checkout Btn Assembly
		$x = $i + 1;
		$pp_checkout_btn .= '<input type="hidden" name="item_name_' . $x . '" value="' . $product_name . '">
        <input type="hidden" name="amount_' . $x . '" value="' . $price . '">
        <input type="hidden" name="quantity_' . $x . '" value="' . $each_item['quantity'] . '">  ';
		// Create the product array variable
		$product_id_array .= "$item_id-".$each_item['quantity'].","; 
		// Dynamic table row assembly
		$cartOutput .= "<tr>";
		$cartOutput .= '<td><a href="product_details.php?id=' . $item_id . '">' . $product_name . '</a><br /><img src="images/products/' . $image . '" alt="' . $product_name. '" width="40" height="52" border="1" /></td>';
		$cartOutput .= '<td>' . $product_name . '</td>';
		$cartOutput .= '<td>Rs ' . $price . '</td>';
		$cartOutput .= '<td><form action="cart.php" method="post">
		<input name="quantity" type="text" disabled value="' . $each_item['quantity'] . '" size="1" maxlength="2" />
		<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
		</form></td>';
		//$cartOutput .= '<td>' . $each_item['quantity'] . '</td>';
		$cartOutput .= '<td>Rs ' . $pricetotal . '</td>';
		$cartOutput .= '<td><form action="cart.php" method="post"><input name="deleteBtn' . $item_id . '" type="submit" value="X" /><input name="index_to_remove" type="hidden" value="' . $i . '" /></form></td>';
		$cartOutput .= '</tr>';
		$i++; 
		// foreach ($each_item['quantity'] as $key => $value) {
		// 	# code...
		// }
		
		$quantity_arr[] = $each_item['quantity'];
		

		//$quan = $each_item['quantity'];
		$_SESSION['details']= $details;
		$_SESSION['cartTotal']= $cartTotal;
    } 
    		$_SESSION['quantity'] = $quantity_arr;
	
	$cartTotal = "<div style='font-size:18px; border:1px solid #40403E;  margin-top:12px;' align='center'>Cart Total : ".$cartTotal."</div>";

}

?>
<?php require_once('inc/top.php'); ?>
</head>
<body>
  <?php require_once('inc/header.php');?>
  <div id="pageContent">
    <div style="margin:24px; text-align:left;">
	
    <br />
    <table width="100%" border="1" cellspacing="0" cellpadding="6">
      <tr>
        <td width="18%" bgcolor="#a01313" style="color:white;"><strong>Product</strong></td>
        <td width="45%" bgcolor="#a01313" style="color:white;"><strong>Product Description</strong></td>
        <td width="10%" bgcolor="#a01313" style="color:white;"><strong>Unit Price</strong></td>
        <td width="9%" bgcolor="#a01313" style="color:white;"><strong>Quantity</strong></td>
        <td width="9%" bgcolor="#a01313" style="color:white;"><strong>Total</strong></td>
        <td width="9%" bgcolor="#a01313" style="color:white;"><strong>Remove</strong></td>
      </tr>
     <?php echo $cartOutput; ?>
     <!-- <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr> -->
    </table>
    <?php echo $cartTotal; ?>
    <br />
<br />
<?php //echo $pp_checkout_btn; ?>
    <br />
    <br />
    	<?php if(isset($_SESSION['cart_array'])==true){
?>
    <a href="cart.php?cmd=emptycart">Click Here to Empty Your Shopping Cart</a>
    <?php
    }
    ?>
    </div>

    <section id="do_action">
		<div class="container" align="center">
	
		<?php if(!isset($_SESSION['cart_array'])){
			?>
		<a class="btn btn-default check_out "  href="index.php">Continue Shopping</a>
		<?php	
		}

		else
		 {
   ?>
   <a class="btn btn-default check_out "  href="index.php">Continue Shopping</a>	
	<a class="btn btn-default check_out" name="continue"  href="form.php">Continue to Payment</a>
  	<a class="btn btn-default check_out" href="cart.php?cmd=emptycart">Cancel Shopping</a>	
  	<?php	
		}

		?>
	
		</div>
	</section>
   <br />
  </div>
  <?php require_once('inc/footer.php');?>
</div>
</body>
</html>