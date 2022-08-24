<?php
	error_reporting();
	include 'include/connection.php';

if(! empty($_REQUEST))
{
$id=$_GET["x"];

$db=mysqli_query($con,"delete from user where username='$id'");
	
	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('User deleted succesfully.');
			window.location.href='users.php';</script>";
	}
	else
	{
		echo "<script>alert('can`t be delete!! selected user is related in other table.');
			window.location.href='users.php';</script>";
	}
}
else
{
	header("location:users.php");
}
?>