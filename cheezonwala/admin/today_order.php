<?php require_once('inc/top.php'); ?>


<!-- SET Time -->
	<?php
date_default_timezone_set("Asia/Karachi");
$current_time= date("Y-m-d h:i:s") . "<br>";



$d=strtotime("today");
$cureent_day_start_time= date("Y-m-d 00:00:00", $d) . "<br>";

?>
<!-- //SET Time -->
<!-- pagination -->

<?php

$showRecordPerPage = 5;
$firstPage = 1;

$query = "SELECT * FROM product_order  where product_order.product_order_time 
between  '$cureent_day_start_time' AND '$current_time'";

$Result = mysqli_query($conn, $query);
$totalRows = mysqli_num_rows($Result);
$lastPage = ceil($totalRows/$showRecordPerPage);


if(isset($_GET['page']) && !empty($_GET['page'])){
$currentPage = $_GET['page'];
  if($currentPage>$lastPage || $currentPage<$firstPage)
  //$page=1;
  header("location:today_order.php?page=0");
}
else
$currentPage=1;
$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;

?>
<!-- pagination end -->



<?php require_once("inc/header.php");?>

<div class="container-fluid main-container">

<?php require_once("inc/sidebar.php");?>

</head>
<body>


    <div class="col-md-8 content" style="margin-left:10px">

    <div class="panel-heading" style="background-color:#c4e17f">
	<h1>Daily Orders  </h1></div><br>

<div class='table-responsive'>  

<div style="overflow-x:scroll;">

<table class="table  table-hover table-striped" style="font-size:18px">

<tr><th>Customer Name</th><th>Products</th><th>Contact | Email</th><th>Address</th><th>Details</th><th>Quantity</th><th>Total price</th><th>Time</th> <th>Action</th></tr>



<?php 


$result="SELECT customer.c_name,customer.c_email,customer.c_contact_no,customer.c_zip_code,customer.c_address,orders.p_name,orders.details,product_order.quantity,orders.price, 
    product_order.product_order_time,product_order.product_order_id FROM product_order 
    inner join customer on product_order.customer_id=customer.c_id 
	inner join orders on product_order.Order_id=orders.order_id
    where product_order.product_order_time between '$cureent_day_start_time' AND '$current_time'
    ORDER BY time DESC  
    LIMIT $startFrom, $showRecordPerPage" ;


$result1 = $conn->query($result);

if($result1->num_rows>0)
{
	
	while ($row = $result1->fetch_assoc()) 
	{	

		echo "<tr>
		<td>".$row['c_name']."</td>
		<td>".$row['p_name']."</td>
		<td>".$row['c_email']."<br>".$row['c_contact_no']."</td>
		<td>".$row['c_address']."<br>ZIP:". $row['c_zip_code']."<br></td>
		<td>".$row['details']."</td>
		<td>".$row['quantity']."</td>
		<td>".$row['price']."</td>
		<td>".$row['product_order_time']."</td>
		<td>
		<a class='btn btn-danger' href=?o_id=".$row['product_order_id'].">Delete</a>
		</td>
		</tr>";
		
}
}
?>



           


</table>

</div>


<!-- pagination -->

 <nav aria-label="Page navigation">
<ul class="pagination">
	<?php if($totalRows>0){ ?>
<?php if($currentPage != $firstPage) { ?>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
<span aria-hidden="true">First</span>
</a>
</li>
<?php } ?>

<?php if($currentPage >= 2) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
<?php } ?>

<li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>

<?php if($currentPage != $lastPage) { ?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
<li class="page-item">
<a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
<span aria-hidden="true">Last</span>
</a>
</li>
<?php }} ?>


</ul>
</nav>
<br>
</br>


<!-- //pagination -->




	</div>
	</div>
	</div>
	<?php require_once('inc/footer.php');?>
















<?php


	if(isset($_GET['o_id'])){
	 $order_id=$_GET['o_id'];

	//Delete Query 
 $query ="DELETE FROM product_order  WHERE  product_order_id = '$order_id' ";	
   if (mysqli_query($conn, $query)) {
	    echo "<script type='text/javascript'>
	          alert('Deleted Successfully');
	          location='today_order.php';
	          </script>";

	  } 
	  else
	       {
	//echo "Error deleting record: " . mysqli_error($conn);
	  echo "<script type='text/javascript'>
	          alert('Try Again Later ');
	          location='today_order.php';
	          </script>";


	
	  }
	}

	?> 
<!-- /Delete  -->
