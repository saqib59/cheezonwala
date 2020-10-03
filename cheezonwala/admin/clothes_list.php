<?php
require_once('inc/top.php');
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$product_id=$_GET['product_id'];
///////picture delete/////////
$result= "select image from products where product_id='$product_id'"
or die("query is incorrect...");
$conn->query($result);

list($picture)=mysqli_fetch_array($result);
$path="../images/products/$picture";

if(file_exists($path)==true)
{
  unlink($path);
}
else
{}
/*this is delet query*/
$deleteq = "DELETE from products where product_id='$product_id'" or die("query is incorrect...");
$conn->query($deleteq);
}

///pagination

?>

</head>
<body>

  <?php include("inc/header.php");?>
    <div class="container-fluid main-container">
  <?php include("inc/sidebar.php");?>
    <div class="col-md-8 content" style="margin-left:10px">
    <div class="panel-heading" style="background-color:#c4e17f">
  <h1>Clothes list  </h1></div><br>
<div class='table-responsive'>  
<div style="overflow-x:scroll;">
<table class="table  table-hover table-striped" style="font-size:18px">
<tr>
	<th>Image</th>
	<th>Brand</th>
	<th>Name</th>
	<th>Price</th>
	<th> <a class=" btn btn-primary" href="add_products.php">Add New</a> </th>
</tr>
<?php 

date_default_timezone_set("Asia/Karachi");
$current_time= date("Y-m-d h:i:s") . "<br>";
$result2="SELECT products.product_id, products.image,categories.cat_brand,products.product_name, products.price from products inner join categories on products.cat_id=categories.cat_id order by '$current_time' DESC  " or die ("query 1 incorrect.....");

$result3 = $conn->query($result2);
// if($result3 = $conn->query($result2)==true)
// {
//  echo "good";
// }
// else {
//  echo "not good" .$conn->error;
// }

if($result3->num_rows>0)
{

while(list($product_id,$image,$cat_brand,$product_name,$price)=mysqli_fetch_array($result3))
{
echo "<tr><td><img src='../images/products/$image' style='width:50px; height:50px; border:groove #000'></td><td>$cat_brand</td><td>$product_name</td>
<td>$price</td>
<td>

<a class=' btn btn-success' href='clothes_list.php?product_id=$product_id&action=delete'>Delete</a>
</td></tr>";
}
}

//<td><a href='editproduct.php?edit=$product_id'><i class='fa fa-pencil'></i></a></td>
?>
</table>
</div></div>

</div></div>
 <?php require_once('inc/footer.php'); ?>
