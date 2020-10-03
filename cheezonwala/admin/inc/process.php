<?php
require_once('db.php');

 session_start();
if (!isset($_SESSION['email'])) 
{
    header('location:../login.php');
}

/////////////////////////////  ADD CATEGORY   ////////////////////////////////////

if(isset($_POST['add-category']))
{
	$cat_name = $_POST['cat-name'];
	if(empty($cat_name))
	{
		header('location:../categories.php?error= Category name required');
	}
	else
	{
		$query = "INSERT INTO `categories` (`cat_name`) VALUES ('$cat_name')";
		if ($conn->query($query)==true) 
		{
			header('location:../categories.php?success= Category has been added');
		}
		else
		{
			header('location:../categories.php?error= This Category already exists');
		}
	}
}




/////////////////////////////  UPDATE CATEGORY   ////////////////////////////////////



if(isset($_POST['update-category']))
{
	$edit_id = $_GET['Update_cat'];
	$upcat_name = $_POST['up-cat-name'];
	
	if(empty($upcat_name))
	{
		header("location:../categories.php?uperror= Category name required&edit= $edit_id");
	}
	else
	{
		$query = "UPDATE `categories` SET `cat_name` = '$upcat_name' WHERE `cat_id` = $edit_id";
		if ($conn->query($query)==true) 
		{
			header("location:../categories.php?upsuccess= Category has been updated&edit= $edit_id");
		}
		else
		{
			header("location:../categories.php?uperror= This Category already exists&edit= $edit_id");
		}
		
	}

}
?>