<?php
 require_once('inc/top.php');
require_once('inc/conn.php'); ?>
</head><!--/head-->

<body>
<?php require_once('inc/header.php'); ?>
	
	<section id="slider"><!--slider-->
	<div class="container">
	<div class="row">
	<div class="col-sm-12">
	<div id="slider-carousel" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
<li data-target="#slider-carousel" data-slide-to="0" class=""></li>
<li data-target="#slider-carousel" data-slide-to="1" class=""></li>
<li data-target="#slider-carousel" data-slide-to="2" class="active"></li>
	</ol>
	    <div class="carousel-inner">
		<div class="item active">
		<div class="col-sm-6">
<h1><span>Cheezon</span>Wala</h1>
<h2>Shoes</h2>
<p>CheezonWala offers you only one Brand products in Shoes "Nike". Like 'Addidas, Vans, & Supreme'
</p>
<a href="link_form.php?link=shoes" class="btn btn-default get">Get it now
</a>
		</div>
		<div class="col-sm-6">
<img src="images/home/3.jpg" class="girl img-responsive" alt="">
		</div></div>

		<div class="item">
		<div class="col-sm-6">
<h1><span>Cheezon</span>Wala</h1>
<h2>Men’s Clothing</h2>
<p>We bring to your doorsteps a wide range of professional brands, like: Nishat-Linen, MariaB, Gul-Ahmed, Khaadi, Asim-Jofa and many, many more. </p>
<a href="link_form.php?link=jeans" class="btn btn-default get">Get it now
</a>
		</div>
		<div class="col-sm-6">
<img src="images/home/2.jpg" class="girl img-responsive" alt="">
		</div></div>
							
		<div class="item">
		<div class="col-sm-6">
<h1><span>Cheezon</span>Wala</h1>
<h2>Sweatshirts</h2>
<p>Sweatshirts offered by Lets Shop is ideal for all occasions, seasons and moods, such as: Weddings, Eid, Parties, Casual Gatherings
.</p>
<a href="link_form.php?link=sweatshirt"class="btn btn-default get">Get it now
</a>
		</div>
		<div class="col-sm-6">
<img src="images/home/1.jpg" class="girl img-responsive" alt="">
		</div>
		</div>
		</div>
						
<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
<i class="fa fa-angle-left"></i></a>
<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next"><i class="fa fa-angle-right"></i>
		</a>
		</div></div>
		</div></div>
	    </section><!--/slider-->
	
	<section>
	
	<section>
		<div class="container">
			<div class="row my-flex-card">
				
			<?php require_once('inc/sidebar.php') ?>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
				
					
							<?php 
							
							
$cosmetics="SELECT product_id, product_name, image, price, c_price from products  order by rand() ,time Desc LIMIT 0,12";
$result=mysqli_query($conn,$cosmetics);
if(mysqli_num_rows($result)>0){
while(list($product_id,$product_name,$image,$price,$c_price)=mysqli_fetch_array($result))
{
echo"
	<div class='col-sm-3 col-md-3'>
							<div class='product-image-wrapper flex-fill'>
								<div class='single-products'>
										<div class='productinfo text-center'>
											<a href='product_details.php?id=$product_id'><img src='images/products/$image'></a>

												
							
											<h2>Rs: $price <span><strike><p>Rs: $c_price</p></strike></span></h2>
											<p>$product_name</p>
											<a href='link_cart.php?id=$product_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>
										</div>
										<div class='product-overlay'>
											<div class='overlay-content'>
												<h2>Rs: $price <span><strike><p>Rs: $c_price</p></strike></span></h2>
												<p>$product_name</p>
												<a href='product_details.php?id=$product_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Product Details</a>
											</div>
										</div>
								</div>
								
							</div>
						</div>
";
}
}
else{
	echo "Error deleting record: " . mysqli_error($conn);
}
 ?>




					
						
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">

                      Recommended Items</h2>
		<?php include("inc/recommended.php");?>
	</div>
				
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	<?php require_once('inc/footer.php') ?>
</html>