<?php
	error_reporting();
	include 'include/connection.php';

if(isset($_REQUEST["submit"]))	
{
	extract($_POST);
	$db=mysqli_query($con,"insert into category(cat_name,fest_id) values('$r1','$r2')");
	
	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Category inserted succesfully');
			window.location.href='category.php';</script>";
	}
	else
	{
		echo "<script>alert('Please enter unique value.');
			window.location.href='category.php';</script>";
	}
}
else
{
	header("location:category.php");
}
?>