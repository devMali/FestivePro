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

	unlink("images/$old_image");
	move_uploaded_file($tname,$path);
 
	$q="insert into product(pro_name,pro_desc,unit_id,sub_id,pro_price,stock) values('$r1','$r2','$r3','$r4','$r5','$r7')";
	$db=mysqli_query($con,$q);

	$q1="select * from product order by pro_id desc limit 1";
	$db=mysqli_query($con,$q1);

	while($row=mysqli_fetch_array($db))
	{
		$pro_id=$row['pro_id'];
	}

	$q2="insert into image(image_name,pro_id) values('$fname','$pro_id')";
	$db=mysqli_query($con,$q2);

	if (mysqli_affected_rows($con)==1) 
	{
		echo "<script>alert('Product inserted succesfully');
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