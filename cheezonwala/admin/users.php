<?php require_once('inc/top.php');
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$user_id=$_GET['user_id'];

/*this is delet quer*/
$query1 = "delete from admin where admin_id='$user_id'"or die("query is incorrect...");
$conn->query($query1);
} 
?>
  </head>
  <body>
    <div id="wrapper">
        <?php require_once('inc/header.php'); ?>

        <div class="container-fluid body-section">
            <div class="row">
                <?php require_once('inc/sidebar.php'); ?>
                <div class="col-md-9">
                    <h1><i class="fa fa-users"></i> Users <small>View All Users</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-users"></i> Users</li>
                    </ol>
                    
                    <table class="table table-bordered table-hover table-striped" style="font-size:18px">
    <tr>
                <th>Admin(s) Email</th>
               
    <th><a href="add_users.php">Add New</a></th></tr>    
<?php 
$query2 = "select admin_id, email, password from admin"or die ("query 2 incorrect.......");
$aone = $conn->query($query2);
if($aone->num_rows>0)
{
                while($row = $aone->fetch_assoc())
            {
            echo "<tr><td>".$row['email']."</td>";

            echo"<td>
            
            <a href='manage_users.php?user_id=".$row['admin_id']."&action=delete'>Delete</a>
            </td></tr>";
            }
}


$conn->close();
?>
</table>
                    
                   
                </div>
            </div>
        </div>
<?php require_once('inc/footer.php'); ?>