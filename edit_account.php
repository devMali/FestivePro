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

	$su="select *from user where username='$c'";
	$run_su=mysqli_query($con,$su);
	while($row_su=mysqli_fetch_array($run_su))
	{
		$password=$row_su['password'];
	}

if(isset($_GET['edit_account']))
{
//getting user
$c=user();

	$get_c="select *from user where username='$c'";
	$run_c=mysqli_query($con,$get_c);
	while($row_c=mysqli_fetch_array($run_c))
	{
		$customer_id=$row_c['username'];
		$fname=$row_c['fname'];
		$lname=$row_c['lname'];
		$add=$row_c['address'];
		$area=$row_c['area_id'];
		$phone=$row_c['mobile_no'];
		$email=$row_c['email'];
		$pass=$row_c['password'];
	//	$secQ=$row['sec_que'];
	//	$secA=$row['sec_ans'];
		
	$q=mysqli_query($con,"select * from city");

	}
}
?>
				<header>
					<h3 class="head text-center">Edit Account</h3>
				</header>

<form action="" method="post">	
	<table align="center">
		<tr>
			<td>First Name:</td>
			<td><input type="text" name="r1" value="<?php echo $fname; ?>" /></td>	
		</tr>
		<tr>
			<td>Last Name:</td>
			<td><input type="text" name="r6" value="<?php echo $lname; ?>" /></td>	
		</tr>
		
		<tr>
			<td>Address:</td>
			<td><textarea name="r2" rows="4"><?php echo $add; ?></textarea></td>	
		</tr>
		<tr>
			<td>City</td>
			<td>
			<ul>
		<li class="text-info">
		<select id="city" name="city" onchange="FetchArea(this.value)" required>
			<?php
			if (mysqli_num_rows($q) > 0 ) {
				echo '<option value="  " selected>Select City</option>';
			
			while($row=mysqli_fetch_array($q))
			{
			?>
			<option value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name'] ?></option>
			<?php
			}
		}
			?>
			</select>
		</li>
		</ul>
			</td>
			</tr>
			<tr align="center">
				<td>Area:</td>
				<td>
					<ul>
			<li class="text-info">
			<select name="r3" id="area"   required>
            <option>Select area</option>
          </select>
			</li>
		</ul>
				</td>
			</tr>
		<tr>
			<td>Mobile No:</td>
			<td><input type="text" name="r4" value="<?php echo $phone; ?>" maxlength="10" /></td>	
		</tr>
		<tr>
			<td>E-mail:</td>
			<td><input type="text" name="r5" value="<?php echo $email; ?>" /></td>	
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="update_acc" value="Update Now"  /></td>
		</tr>
	</table>
</form>

<?php
if(isset($_POST['update_acc']))
{
	$update_id=$c;
	extract($_POST);

		if(!preg_match("/^[a-zA-Z]*$/", $r1) )
		{	
			echo "<script>alert('Please, Enter Valid Name.');
			window.open('my_account.php?edit_account','_self');</script>";
		}	
		else if(strlen($r1) < 3)
		{	
			echo "<script>alert('Please, Name should be greater than 3 characters.');
			window.open('my_account.php?edit_account','_self');</script>";
		}	
			else if(preg_match("/^[ ]*$/", $r2))
			{	
			echo "<script>alert('Please, Enter Valid Address.');
			window.open('my_account.php?edit_account','_self');</script>";
			}
		
			else if(! is_numeric($r4) || strlen($r4)!=10)
			{
			echo "<script>alert('Please, Enter Valid Mobile Number.');
			window.open('my_account.php?edit_account','_self');</script>";
			}
			else if(!filter_var($r5, FILTER_VALIDATE_EMAIL))
			{
			echo "<script>alert('Please, Enter Valid E-mail Address.');
			window.open('my_account.php?edit_account','_self');</script>";
			}
		else
		{
			try
			{
				$update_c="update user set fname='$r1',lname='$r6',address='$r2',area_id='$r3',mobile_no=$r4,email='$r5' 
			where username='$update_id'";

			$run_c=mysqli_query($con,$update_c);
			
			}
			catch(Exception $e)
			{
				echo $e;
			}
			if(mysqli_affected_rows($con)==1)
			{				
				echo "<script>alert('Your Account has been updated');
				window.open('my_account.php','_self');</script>";

			}
			else
			{
				echo "<script>alert('please, enter unique details.');
				window.open('my_account.php?edit_account','_self');</script>";
			}
		}	
}

?>
<script type="text/javascript">

function FetchArea(id){
  $('#area').html('');
  $.ajax({
	type:'post',
	url: 'ajax',
	data : { city_id : id},
	success : function(data){
	   $('#area').html(data);
	}

  })
}


</script>