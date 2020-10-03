<?php
require_once('inc/top.php');
if(isset($_POST['submit']))
{
$product_name=$_POST['product_name'];
$details=$_POST['details'];
$price=$_POST['price'];
$c_price=$_POST['c_price'];
$product_type=$_POST['product_type'];
$brand=$_POST['brand'];
$tags=$_POST['tags'];



//picture coding
$picture_name=$_FILES['picture']['name'];
$picture_type=$_FILES['picture']['type'];
$picture_tmp_name=$_FILES['picture']['tmp_name'];
$picture_size=$_FILES['picture']['size'];


date_default_timezone_set("Asia/Karachi");
$current_time= date("Y-m-d h:i:s") . "<br>";

if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
{
  if($picture_size<=50000000)
  {
    $pic_name=time()."_".$picture_name;
    move_uploaded_file($picture_tmp_name,"../images/products/".$pic_name);
    $run = mysqli_query($conn,"insert into categories( cat_brand, cat_tag,cat_type ) values ( '$brand', '$tags','$product_type')") or die ("query 3 incorrect");
     $last_id = $conn->insert_id;
    
  mysqli_query($conn,"insert into products (`product_name`, `details`, `image`, `price`, `c_price`,`time`,`cat_id`) VALUES ('$product_name','$details','$pic_name','$price','$c_price','$current_time','$last_id')") or die ("query incorrect");

 header("location: sumit_form.php?success=1");
}else
{}
}else
{}
mysqli_close($conn);
}
?>

</head>
<body>
 
     <?php include("inc/header.php");?>
    <div class="container-fluid">
  <?php include("inc/sidebar.php");?>
    <div class="col-md-8 content" style="margin-left:10px">
    <div class="panel panel-default">
  <div class="panel-heading" style="background-color:#c4e17f">
  <h1><span class="glyphicon glyphicon-tag"></span> Product / Add Product  </h1></div><br>
  <div class="panel-body" style="background-color:#E6EEEE;">
    <div class="col-lg-7">
        <div class="well">
        <form action="add_products.php" method="post" name="form" enctype="multipart/form-data">
        <p>Title</p>
        <input class="input-lg thumbnail form-control" type="text" name="product_name" id="product_name" style="width:100%" placeholder="Product Name" required>
<p>Description</p>
<textarea class="thumbnail form-control" name="details" id="details" style="width:100%; height:100px" placeholder="write here..." required></textarea>
<p>Add Image</p>
<div style="background-color:#CCC">
<input type="file" style="width:100%" name="picture" class="btn thumbnail" id="picture" >
</div>
</div>
<div class="well">
<h3>Pricing</h3>
<p>Price</p>
<div class="input-group">
      <div class="input-group-addon">Rs</div>
      <input type="text" class="form-control" name="price" id="price"  placeholder="0.00" required>
    </div><br>
<p>Compare at price</p>
<div class="input-group">
      <div class="input-group-addon">Rs</div>
      <input type="text" name="c_price" id="c_price" class="form-control" placeholder="0.00">
    </div>
    </div>
        </div>  
        <div class="col-lg-5">
        <div class="well">
<h3>Category</h3>  
<p>Product type</p>
<input type="text" name="product_type" id="product_type" class="form-control" placeholder="Shirt, Shoes etc">
<br>
<p>Vendor / Brand</p>
<input type="text" name="brand" id="brand" class="form-control" placeholder="Polo, Nike etc">
<br>
<p>Other tags</p>
<input type="text" name="tags" id="tags" class="form-control" placeholder="Summer, Soft, Cotton etc">
</div>          
</div>

<div align="center">
    <button type="submit" name="submit" id="submit" class="btn btn-default" style="width:100px; height:60px"> Cancel</button>
    <button type="submit" name="submit" id="submit" class="btn btn-success" style="width:150px; height:60px"> Add Product</button>
    </div>
        </form>
 
  </div>
</div></div></div>
  <footer class="text-center footer col-sm-12">
            Copyright &copy; by <a href="https://www.facebook.com/saqib59">Saqib Ali</a>
        </footer>
    </div>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>