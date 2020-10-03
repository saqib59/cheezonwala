<?php
include("inc/top.php"); 
require_once("inc/db.php");

if(isset($_POST['btn_save']))
{
$user_name=$_POST['user_name'];
$user_password=$_POST['user_password'];

mysqli_query($conn,"insert into admin(email, password) values 
('$user_name','$user_password')") 
			or die ("Query 1 is inncorrect........");
header("location: manage_users.php"); 
mysqli_close($conn);
}
require_once("inc/top.php");
?>

</head>
<body>
<?php include("inc/header.php"); ?>

<div class="container-fluid">
<?php include("inc/sidebar.php"); ?>

  <div class="col-sm-8 " align="center">	
  <div class="panel-heading" style="background-color:#c4e17f">
	<h1>Add User  </h1></div><br>
	
<form action="add_users.php" name="form" method="post">
<input name="user_name" class="input-lg" type="email"  id="user_name" style="font-size:18px; width:200px" placeholder="User-Name" autofocus required><br><br>
<input name="user_password" class="input-lg" type="text"  id="user_password" style="font-size:18px; width:200px"  placeholder="Password" required>
<hr>
 <button type="submit" class="btn btn-success" name="btn_save" id="btn_save" style="font-size:18px">Submit</button>
</form>
</div></div>
<?php include("inc/footer.php"); ?>
</body>
</html>
