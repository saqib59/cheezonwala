<?php require_once('db.php');
 session_start();
if (!isset($_SESSION['email'])) 
{
    header('location:login.php');
}
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CheezonWala | Admin</title>
    <link rel="icon" href="favi.jpg" type="image/jpg" sizes="16x16">
    <!-- Bootstrap -->
    <link href="img/favicon.png" rel="icon">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/animated.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->