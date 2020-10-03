<?php require_once('inc/top.php');
require_once('inc/conn.php'); ?>
</head><!--/head-->

<body>
<?php require_once('inc/header.php') ?>
	<section>
		<div class="container">
			<div class="row">
		
				
				<div class="col-sm-12 padding-right">
					<div class="product-details"><!--product-details-->
						<?php
if(isset($_GET['id'])){
$product_details_id = $_GET['id'];

 $product_details = mysqli_query($conn,"SELECT products.product_id,products.product_name, 
 	products.details,categories.cat_brand,products.image, products.price, products.c_price from products inner join categories on products.cat_id=categories.cat_id  where product_id ='$product_details_id'")or die("Query 1 is inncorrect..........");
 list($product_id,$product_name, $details,$brand,$image,$price,$c_price)= mysqli_fetch_array($product_details);
}
 ?>
						
						
						<!--/product-information-->
						<div class="col-sm-6">
							<br>
							<form method="post" action="cart.php">
							<?php echo" <img id='img_01' src='images/products/$image' data-zoom-image='images/products/$image' class='img-responsive'>" ?>
                            <br>
                            </div>
                            <div class="col-sm-6">

                            <div class="product-information"><!--/product-information-->
								<h2><?php echo"$product_name";?></h2>
								<p><?php echo"$details";?></p>
								
								<span><span>RS: <?php echo $price;?>
						        <strike><p>RS: <?php echo $c_price;?></p></strike></span>
						        <?php	echo"<a href='link_cart.php?id=$product_id' class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>"?>
						        <br>
						       
								
							
								</span>
								<p><b>Brand:</b> CHEEZONWALA</p>
								<a href=""><img src="images/products/<?php echo'$image'; ?>" class="share img-responsive"  alt="" /></a>
								</div>
							</div>
								
							
						</form>

					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						
							
						
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					
					
				</div>
			</div>
		</div>
	</section>
	
	<?php require_once('inc/footer.php') ?>