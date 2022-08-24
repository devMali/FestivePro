<style type="text/css">
* {
    box-sizing: border-box;
}

input[type=file], input[type=text], input[type=number], input[type=password], input[type=email], select, textarea{
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 1px 10px;
    box-sizing: border-box;
    resize: vertical;
	caret-color:#b52e31;
	color:#333333;
	white-space:initial;
}
input[type=submit]{
	color:#006633;
	width:40%;
}
table {
    border-collapse: collapse;
    width:80%;
	border:thin;
	border-color:#999999;
	}
td {
	color:#816263;
    background-color:#F5F5F5;
    padding: 8px;
	text-align:center;
	overflow:hidden;
}

</style>
<?php
if(empty($_REQUEST))
	{
		echo "<script>window.open('my_account.php','_self')</script>";
	}
	error_reporting();
	if(!isset($_SESSION)) 
	{ 
		session_start(); 
	} 
	include 'include/connection.php';
?>
				<header>
					<h3 class="head text-center">Change your Password</h3>
				</header>

<form action="" method="post">	
	<table align="center">
		<tr>
			<td>Enter Current Password:</td>
			<td><input type="password" placeholder="Enter current password:" name="r1" autofocus required  /></td>	
		</tr>
		<tr>
			<td>Enter New Password:</td>
			<td><input type="password" placeholder="At least 6 characters:" name="r2" required  /></td>	
		</tr>
		<tr>
			<td>Enter New Password Again:</td>
			<td><input type="password" placeholder="Retype password:" name="r3" required  /></td>	
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="Update Now"  /></td>
		</tr>

	</table>
</form>

<?php


$c=user();

if(isset($_POST['submit']))
{
	extract($_POST);
	
	$get_real_pass="select *from user where username='$c'";
	$run_real_pass=mysqli_query($con,$get_real_pass);
	while($row=mysqli_fetch_array($run_real_pass))
	{
		$pass=$row['password'];
	}

	$r1=md5($r1);
	
	if($r1!=$pass)
	{	
		echo "<script>alert('Please Enter Valid Current Password.');
			window.open('my_account.php?change_pass','_self');</script>";

	}
	else if(strlen($r2) < 6)
	{
		echo "<script>alert('Passwords must be at least 6 characters.');
			window.open('my_account.php?change_pass','_self');</script>";
	}	
	else if($r2!=$r3)
	{
		echo "<script>alert('The two passwords did not matched.');
			window.open('my_account.php?change_pass','_self');</script>";
	}
	else
	{
		$enc_pass=md5($r2);
	$update_pass="update user set password='$enc_pass' where username='$c'";
	$run_pass=mysqli_query($con,$update_pass);
		echo "<script>alert('Your Password has been changed');
			window.open('my_account.php','_self');</script>";
	}
	
}

?>