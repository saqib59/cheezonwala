<?php require_once('inc/top.php');
require_once('inc/conn.php');

?>

</head><!--/head-->

<body>
	<?php require_once('inc/header.php'); ?>
	
	<section>
		<div class="container">
			<div class="row">
			<div class="col-sm-12 padding-right">
		<div class="features_items"><!--features_items-->
<h2 class="title text-center">Clothes Items</h2>
	<?php 
	
	if(isset($_POST['submit'])){
$search_id =$_POST['search_text'];

$search_query=mysqli_query($conn,"SELECT product_id, product_name, image, price, c_price from products where cat_id IN (SELECT cat_id FROM categories where cat_type like  '%$search_id%')
UNION 
select product_id, product_name, image, price, c_price from products where  cat_id IN (SELECT cat_id FROM categories where cat_brand like  '%$search_id%') 
UNION 
select product_id, product_name, image, price, c_price from products where cat_id IN (SELECT cat_id FROM categories where cat_tag like  '%$search_id%')

  LIMIT 0,12") or die("Query 1 is inncorrect..........");

while(list($product_id,$product_name,$image,$price,$c_price)=mysqli_fetch_array($search_query))
	{
	echo"
<div class='col-sm-3'>
		<div class='product-image-wrapper'>
		<div class='single-products'>
		<div class='productinfo text-center'>
<a href='product_details.php?id=$product_id' class='thumbnail'><img src='images/products/$image' alt='' style='width:250px; height:300px'></a>
<h2>Rs: $price <span><strike><p>Rs: $c_price</p></strike></span></h2>
<p>$product_name</p>
<a href='link_cart.php?id=$product_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>
		</div></div>
		</div></div>
";	
	}}
 ?>
</div></div>
</div><!--features_items-->
                    
         <div class="recommended_items">
		<h2 class="title text-center">recommended items</h2>
					<?php require_once("inc/recommended.php");?>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
<?php include("inc/footer.php"); ?>
  <script src="layout/js/jquery.js"></script>
	<script src="layout/js/bootstrap.min.js"></script>
	<script src="layout/js/jquery.scrollUp.min.js"></script>
	<script src="layout/js/price-range.js"></script>
    <script src="layout/js/jquery.prettyPhoto.js"></script>
    <script src="layout/js/main.js"></script>
<a id="scrollUp" href="#top" style="display: none; position: fixed; z-index: 2147483647;">
<i class="fa fa-angle-up">
</i></a>
   