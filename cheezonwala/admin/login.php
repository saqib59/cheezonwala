<?php
require_once('inc/db.php');
if(isset($_POST['login']))
{
   $email =  $_POST['email'];
   $pass = $_POST['password'];
  // htmlentities($email);
  // htmlentities($pass);
  $checkquery = "SELECT * FROM `admin` WHERE `email`='$email'";
  $result = $conn->query($checkquery);
  if ($result->num_rows>0) 
  {
    $row = $result->fetch_assoc();
    $db_email = $row['email'];
    $db_pass = $row['password']; 
    //$new_password = crypt($pass, $db_pass);
    if ($email == $db_email && $pass == $db_pass) 
    {
      session_start();
      $_SESSION['email'] = $db_email;
      header('location: index.php' );
    }
    else
    {
      $error = "Incorrect Email or password";
    }
  }
  else 
  {
     $error = "Incorrect Email or password";
  }
}
$salt = '$2y$10$quickbrownfoxjumpsover';
$my_pass = "saqib59";
$password = crypt($my_pass,$salt);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.png">

    <title>Login | CHEEZONWALA Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/animated.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin animated shake" method="post">
        <h2 class="form-signin-heading">CHEEZONWALA Login</h2>
        <center>
          <?php
          if (isset($error)) 
          {
            echo "<span style=color:red;>$error;</span>";
          }
          ?>
        </center>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
