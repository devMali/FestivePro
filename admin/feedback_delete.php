<?php
	error_reporting();
	include 'include/connection.php';

if(! empty($_REQUEST))
{
$id=$_GET["x"];

$db=mysqli_query($con,"delete from feedback where feed_id='$id'");

	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Feedback deleted succesfully.');
			window.location.href='feedback.php';</script>";
	}
	else
	{
		echo "<script>alert('can`t be delete!! selected Feedback is related in other table.');
			window.location.href='feedback.php';</script>";
	}
}
else
{
	header("location:feedback.php");
}
?>