<?php
	error_reporting();
	include 'include/connection.php';
if(isset($_REQUEST["submit"]))	
{	
$id=$_POST["r0"];
$cna=$_POST["r1"];

$db=mysqli_query($con,"update city set city_name='$cna' where city_id='$id'");
if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('City updated succesfully.');
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