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
					<h3 class="head text-center">Do you really want to delete your account?</h3>
				</header>

<form action="" method="post">	
	<table align="center">
		<tr>
			<td><input type="submit" name="yes" value="Yes,I want"  /></td>
			<td><input type="submit" name="no" value="No,I do not" style="color:red;"  /></td>
		</tr>
<?php
if(isset($_POST['yes']))
{
?>
		<tr>
			<td>Enter Current Password:</td>
			<td><input type="password" name="r1" autofocus  /></td>	
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="Delete Now"  /></td>
		</tr>
<?php
}
?>
	</table>
</form>

<?php
$c=user();

if(isset($_POST['submit']))
{
	extract($_POST);
	//$r1=mysqli_real_escape_string($_POST['r1']);
	
	$get_real_pass="select * from user where username='$c'";
	$run_real_pass=mysqli_query($con,$get_real_pass);
	while($row=mysqli_fetch_array($run_real_pass))
	{
		$pass=$row['password'];
	}
	$r1=md5($r1);
	if($pass!=$r1)
	{	
		echo "<script>alert('Please, Enter Valid current Password.');
			window.open('my_account.php?delete_account','_self');</script>";
	}
	else
	{
		$delete_customer="delete from user where username='$c'";
		$run_delete=mysqli_query($con,$delete_customer);
		if($run_delete)
		{		
			session_destroy();
			echo "<script>alert('Your account has been deleted,Good Bye!');
			window.open('index.php','_self');</script>";
		}
		else
		{
			echo "<script>alert('Cant delete your account');window.open('my_account.php?delete_account','_self');</script>";
		}
	}
}
if(isset($_POST['no']))
{
			echo "<script>window.open('my_account.php','_self');</script>";
}
?>