<?php
	error_reporting();
	include 'include/connection.php';
if(isset($_REQUEST["submit"]))	
{	
$id=$_POST["r0"];
$cna=$_POST["r1"];

$db=mysqli_query($con,"update unit set unit_name='$cna' where unit_id='$id'");
	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Unit updated succesfully.');
			window.location.href='unit.php';</script>";
	}
	else
	{
		echo "<script>alert('Please enter unique value.');
			window.location.href='unit.php';</script>";
	}
}
else
{
	header("location:unit.php");
}
?>