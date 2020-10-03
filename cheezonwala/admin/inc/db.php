<?php
define("SERVER", 'localhost');
define("USER", 'root');
define("PASS", '');
define("DB_NAME", 'cheezonwala');
$conn = new mysqli(SERVER,USER,PASS,DB_NAME);
if ($conn->connect_error)
 {
	echo "Not Connected".$conn->connect_error;
}

?>