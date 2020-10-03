<?php require_once('inc/top.php'); ?>


<!-- SET Time -->
	


<?php require_once("inc/header.php");?>

<div class="container-fluid main-container">

<?php require_once("inc/sidebar.php");?>

</head>
<body>


    <div class="col-md-8 content" style="margin-left:10px">

    <div class="panel-heading" style="background-color:#c4e17f">
	<h1>TOTAL INCOME </h1></div><br>
	<?php  




$query = "SELECT SUM(orders.price) FROM product_order inner join orders on product_order.Order_id=orders.order_id where product_id IN(SELECT product_id from products where cat_id IN(SELECT cat_id from categories where cat_type='shoes'))";


$result = mysqli_query($conn,$query);

 

// Print out result

while($row = mysqli_fetch_array($result)){

      // echo "Total ". $row['cat_type']. " Income = ". $row['SUM(price)'];
    echo " Income from Shoes= ". $row['SUM(orders.price)'];
       echo "<br />";

}

$query = "SELECT SUM(orders.price) FROM product_order inner join orders on product_order.Order_id=orders.order_id where product_id IN(SELECT product_id from products where cat_id IN(SELECT cat_id from categories where cat_type='shirt'))";


$result = mysqli_query($conn,$query);

 

// Print out result

while($row = mysqli_fetch_array($result)){

      // echo "Total ". $row['cat_type']. " Income = ". $row['SUM(price)'];
    echo " Income from Shirts= ". $row['SUM(orders.price)'];
       echo "<br />";

}

$query = "SELECT SUM(orders.price) FROM product_order inner join orders on product_order.Order_id=orders.order_id where product_id IN(SELECT product_id from products where cat_id IN(SELECT cat_id from categories where cat_type='jeans'))";


$result = mysqli_query($conn,$query);

 

// Print out result

while($row = mysqli_fetch_array($result)){

      // echo "Total ". $row['cat_type']. " Income = ". $row['SUM(price)'];
    echo " Income from Jeans= ". $row['SUM(orders.price)'];
       echo "<br />";

}





$query = "SELECT  SUM(price) FROM orders "; 
 

echo "<h2>TOTAL INCOME</h2>";    

$result = mysqli_query($conn,$query);


// Print out result

while($row = mysqli_fetch_array($result)){

       echo "Total = ". $row['SUM(price)'];

       echo "<br />";

}





$query = "SELECT p_name,count(p_name) from orders group by p_name";
echo "<h2>Product Sales Record</h2>";    

$result = mysqli_query($conn,$query);

 

// Print out result

while($row = mysqli_fetch_array($result)){

       echo " ". $row['p_name']. " = ". $row['count(p_name)'];

       echo "<br />";

}





?>




	</div>
	</div>
	</div>
	<?php require_once('inc/footer.php');?>














