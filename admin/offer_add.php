<?php
	error_reporting();
	include 'include/connection.php';
if(isset($_REQUEST["submit"]))	
{
	extract($_POST);
	$db=mysqli_query($con,"insert into offer (description,start_date,end_date) values('$r1','$r2','$r3')");
		if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Offer inserted succesfully');
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