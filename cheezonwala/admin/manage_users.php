<?php
require_once("inc/top.php");
require_once("inc/db.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$user_id=$_GET['user_id'];

/*this is delet quer*/
mysqli_query($conn,"DELETE from admin where admin_id='$user_id'")or die("query is incorrect...");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Admin Panel</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/k.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body>
<?php include("inc/header.php"); ?>

<div class="container-fluid">

<?php include("inc/sidebar.php"); ?>
<div class="col-sm-8" style="margin-left:10px"> 
<div class="panel-heading" style="background-color:#c4e17f">
	<h1>Manage User </h1></div><br>

<div style="overflow-x:scroll;">
<table class="table table-bordered table-hover table-striped" style="font-size:18px">
	<tr>
			    <th>Admin Email</th>
                <th>Admin Password</th>
	<th><a href="add_users.php">Add New</a></th></tr>	
<?php 
$result=mysqli_query($conn,"SELECT admin_id, email, password from admin")or die ("query 2 incorrect.......");

while(list($user_id,$name,$password)=mysqli_fetch_array($result))
{
echo "<tr><td>$name</td><td>$password</td>";

echo"<td>

<a href='manage_users.php?user_id=$user_id&action=delete'>Delete</a>
</td></tr>";
}
mysqli_close($conn);
?>
</table>
</div>	
</div></div>

<?php require_once('inc/footer.php'); ?>