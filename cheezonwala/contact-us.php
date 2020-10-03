<?php require_once('inc/conn.php');
require_once('inc/top.php'); 
	if(isset($_POST['add'])){
		$fname = $_POST['name']; 
		$f_email = $_POST['email']; 
		$subject = $_POST['subject']; 
		$message = $_POST['message'];
		$errors = 0;
		if (!isset($fname) || empty($p_name)) {
	    $p_name_err = "Please enter product name";
	    $errors++;
	  }
	    if (!isset($desc) || empty($desc)) {
	    $desc_err = "Please enter product description";
	    $errors++;
	  }
	    if (!isset($cat_name) || empty($cat_name)) {
	    $cat_name_err = "Please select a category name";
	    $errors++;
	  }
	    if (!isset($n_price) || empty($n_price)) {
	    $n_price_err = "Please enter product's new price";
	    $errors++;
	  }
	    if (!isset($o_price) || empty($o_price)) {
	    $o_price_err = "Please enter product's old price";
	    $errors++;
	  }
$query="INSERT INTO contact_us (`c_name`,`c_email`,`c_subject`,`c_message`) VALUES ('$fname','$femail','$subject','$message')";
$conn->query($query);
if($conn->query($query)==true)
{
echo "query true";
}
else
{
echo "false";
}
}


 ?>
</head><!--/head-->

<body>
	<?php require_once('inc/header.php'); ?>
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	   		
	    		   			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>  	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Get In Touch</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" action="contact-us.php" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Your full name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Your email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="add" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
				        <?php  


     ?>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>CheezonWala Inc.</p>
							<p>Karachi, Pakistan</p>
							<p>Mobile: +92342-2433512</p>
							<p>Email: info@cheezonwala.pk</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="https://www.instagram.com/cheezonwala1/"><i class="fa fa-instagram"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	<?php require_once('inc/footer.php'); ?>