<?php
	error_reporting();
	include 'include/connection.php';
if(isset($_REQUEST["submit"]))	
{		
extract($_POST);

//$n=date("dmyhis").rand();
$fname=$_FILES["r6"]["name"];
$tname=$_FILES["r6"]["tmp_name"];
$path="../images/$fname";
	move_uploaded_file($tname,$path);

$db=mysqli_query($con,"update image set image_name='$fname' where pro_id='$r0'");
$db=mysqli_query($con,"update product set pro_name='$r1',pro_desc='$r2',unit_id='$r3',sub_id='$r4',pro_price='$r5',
stock='$r7' where pro_id='$r0'");

	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Product updated succesfully.');
			window.location.href='product.php';</script>";
	}
	else
	{
		echo "<script>alert('Please enter unique value.');
			window.location.href='product.php';</script>";
	}
}
else
{
	header("location:product.php");
}
?>