<?php
	error_reporting();
	include 'include/connection.php';
if(isset($_REQUEST["submit"]))	
{
	extract($_POST);
	$db=mysqli_query($con,"insert into subcategory(sub_name,cat_id) values('$r1','$r2')");
	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Subcategory inserted succesfully');
			window.location.href='subcategory.php';</script>";
	}
	else
	{
		echo "<script>alert('Please enter unique value.');
			window.location.href='subcategory.php';</script>";
	}
}
else
{
	header("location:subcategory.php");
}
?>