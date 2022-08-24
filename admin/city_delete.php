<?php
	error_reporting();
	include 'include/connection.php';

if(! empty($_REQUEST))
{
$id=$_GET["x"];

$db=mysqli_query($con,"delete from city where city_id='$id'");
	
	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('City deleted succesfully.');
			window.location.href='city.php';</script>";
	}
	else
	{
		echo "<script>alert('can`t be delete!! selected city is related in other table.');
			window.location.href='city.php';</script>";
	}
}
else
{
	header("location:city.php");
}
?>