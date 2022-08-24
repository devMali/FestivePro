<?php
	error_reporting();
	include 'include/connection.php';
if(isset($_REQUEST["submit"]))	
{
	extract($_POST);
	$db=mysqli_query($con,"insert into city (city_name) values('$r1')");
		if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('City inserted succesfully');
			window.location.href='city.php';</script>";
	}
	else
	{
		echo "<script>alert('Please enter unique value.');
			window.location.href='city.php';</script>";
	}
}
else
{
	header("location:city.php");
}		
?>