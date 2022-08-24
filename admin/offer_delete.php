<?php
	error_reporting();
	include 'include/connection.php';

if(! empty($_REQUEST))
{	
$id=$_GET["x"];

$db=mysqli_query($con,"delete from offer where offer_id='$id'");

	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Offer deleted succesfully.');
			window.location.href='offer.php';</script>";
	}
	else
	{
		echo "<script>alert('can`t be delete!! selected offer is related in other table.');
			window.location.href='offer.php';</script>";
	}
}
else
{
	header("location:offer.php");
}
?>