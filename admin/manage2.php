
<?php

include 'include/connection.php';

//$c=user();
//echo"<script>alert('$c');</script>";
if(isset($_SESSION['client']['r1']))
	{
		$c=user();
		//echo"<script>alert('$c');</script>";
	}
	
if(isset($_POST['submit']))
{
	extract($_POST);
	
	$get_real_pass="select *from user where username='admin'";
	$run_real_pass=mysqli_query($con,$get_real_pass);
	while($row=mysqli_fetch_array($run_real_pass))
	{
		$pass=$row['password'];
	}

	$r1=md5($r1);
	
	if($r1!=$pass)
	{	
		echo "<script>alert('Please Enter Valid Current Password.');
			window.open('manage.php','_self');</script>";

	}
	else if(strlen($r2) < 6)
	{
		echo "<script>alert('Passwords must be at least 6 characters.');
			window.open('manage.php','_self');</script>";
	}	
	else if($r2!=$r3)
	{
		echo "<script>alert('The two passwords did not matched.');
			window.open('manage.php','_self');</script>";
	}
	else
	{
		$enc_pass=md5($r2);
	$update_pass="update user set password='$enc_pass' where username='admin'";
	$run_pass=mysqli_query($con,$update_pass);
		echo "<script>alert('Your Password has been changed');
			window.open('index.php','_self');</script>";
	}
	
}

?>
