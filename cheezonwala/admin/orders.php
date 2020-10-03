
<?php require_once('inc/top.php'); ?>


<!-- pagination -->

<?php

$showRecordPerPage = 5;
$firstPage = 1;
$query = "SELECT * FROM product_order";
$Result = mysqli_query($conn, $query);
$totalRows = mysqli_num_rows($Result);
$lastPage = ceil($totalRows/$showRecordPerPage);


if(isset($_GET['page']) && !empty($_GET['page'])){
$currentPage = $_GET['page'];
  if($currentPage>$lastPage || $currentPage<$firstPage)
  //$page=1;
  header("location:orders.php?page=0");
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
	<h1>Total Orders </h1>

</div><br>

<div class='table-responsive'> 

<div style="overflow-x:scroll;">

<table class="table  table-hover table-striped" style="font-size:18px">
	
<tr><th>Customer Name</th><th>Products</th><th>Contact | Email</th><th>Address</th><th>Quantity</th><th>Total price</th><th>Time</th><th>Action</th></tr>
<?php 
$result="SELECT DISTINCT customer.c_name,customer.c_email,customer.c_contact_no,customer.c_zip_code,customer.c_address,orders.p_name,orders.details,product_order.quantity,orders.price,product_order.product_order_time,orders.order_id,product_order.product_order_id FROM product_order inner join customer on product_order.customer_id=customer.c_id 
	inner join orders on product_order.Order_id=orders.order_id 
	order by time Desc  LIMIT $startFrom, $showRecordPerPage";


/*$result="SELECT customer.c_name,customer.c_email,customer.c_contact_no,customer.c_zip_code,customer.c_address,orders.p_name,orders.details,orders.quantity,orders.price, orders.time,orders.order_id FROM orders inner join customer on orders.c_id=customer.c_id 
order by time Desc  LIMIT $startFrom, $showRecordPerPage " ;*/

//$result="select * from orders order by time Desc Limit $page1,10" ;
$result1 = $conn->query($result);
$prod_names_arr = array();
if($result1->num_rows>0)
{
	
	while (list($c_name,$c_email,$contact_no,$zip_code,$address,$prod_name,$details,$quantity,$price,$time,$o_id,$po_id)=mysqli_fetch_array($result1)) 
	{	
		// echo "<pre>";
		// var_dump($c_name);
		// echo "</pre>";
	
		echo "<tr>

		<td>$c_name</td>
		<td>$prod_name</td>
		<td>$c_email<br>$contact_no</td>
		<td>$address<br>ZIP:$zip_code<br></td>
		<td>$quantity</td>
		<td>$price</td>
		<td>$time</td>
		<td>
		<a class='btn btn-danger' href=?to_id=$po_id>Delete</a>
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
</nav><br>
</br>


<!-- //pagination -->
</div>

</div>
</div>









<?php require_once('inc/footer.php');?>

<?php


	if(isset($_GET['to_id'])){
	 $order_id=$_GET['to_id'];

	//Delete Query 
	 $query ="DELETE FROM product_order  WHERE  product_order_id = '$order_id' ";
	  if (mysqli_query($conn, $query)) {
	    echo "<script type='text/javascript'>
	          alert('Deleted Successfully');
	          location='orders.php';
	          </script>";

	  } 
	  else
	       {
	//echo "Error deleting record: " . mysqli_error($conn);
	  echo "<script type='text/javascript'>
	          alert('Try Again Later ');
	          location='orders.php';
	          </script>";


	
	  }
	}

	?> 
<!-- /Delete  -->