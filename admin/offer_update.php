<?php
	error_reporting();
	include 'include/connection.php';
if(isset($_REQUEST["submit"]))	
{	
    extract($_POST);

$db=mysqli_query($con,"update offer set description='$r1',start_date='$r3',end_date='$r3' where offer_id='$id'");
	
	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Offer updated succesfully.');
			window.location.href='offer.php';</script>";
	}
	else
	{
		echo "<script>alert('Please enter unique value.');
			window.location.href='offer.php';</script>";
	}
}
else
{
	header("location:offer.php");
}
?>