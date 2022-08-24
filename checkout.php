<?php	
		error_reporting();
	if(empty($_REQUEST))
	{
		//echo "<script>window.open('index.php','_self')</script>";
	}
	include 'include/connection.php';	
	include 'include/header.php';
	//	include 'functions/functions.php';

?>

<style type="text/css">
* {
    box-sizing: border-box;
}
table
{
	border-radius:4px;
    border-collapse: collapse;
    width:50%;
	border:thin;
	border-color:#999999;
	font-size:18px;
	
}
input[type=file], input[type=text], input[type=number], input[type=checkxox], select, textarea{
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 1px 10px;
    box-sizing: border-box;
    resize: vertical;
	caret-color:#816263;
	color:#816263;
	white-space:initial;
}
input[type=submit]{
	color:#006633;
	width:40%;
}
th {
	color:#816263;
	width:10%;
    background-color:#F5F5F5;
    padding: 10px;
	text-align:center;
	overflow:hidden;
}
td {
	width:40%;
    background-color:#F5F5F5;
    padding: 10px;
	text-align:left;
	overflow:hidden;
}
body
{  
	 font-family: 'Roboto', sans-serif;
}
</style>	
<div class="contact-form">
			<div style="margin-top:30px;" class="contact-info">
				<h3>Shipping Info</h3>
			</div>
<body>	
	

<?php
		$user_id=user();
		$user_select="select * from user where username='$user_id'";
		$run_user=mysqli_query($con,$user_select);
		while($row=mysqli_fetch_array($run_user))
		{
			$fname=$row['fname'];
			$lname=$row['lname'];
			$add=$row['address'];
			$area=$row['area_id'];
			$phone=$row['mobile_no'];
			$email=$row['email'];
		}
		//echo"<script>alert('$add')</script>";
	$q=mysqli_query($con,"select * from city");
	
?>

	
	<form action="cart_empty" method="post">
		<table width="80%" align="center">
			<tr align="center">
				<th>Name:</th>
				<td><input type="text" name="r1" value="<?php echo $fname.' '.$lname; ?>" pattern="[A-Za-z ]{3,50}" title="Must contain atleast 3 characters and no special symbols" required placeholder="Enter your name"  /></td>
			</tr>
			<tr align="center">
				<th>Phone No:</th>
				<td><input type="text" name="r2" value="<?php echo $phone; ?>" pattern="[0-9]{10}"
			title="Must contain numeric value" maxlength="10" required placeholder="Enter phone number"  /></td>
			</tr>
			<tr align="center">
				<th>Email:</th>
				<td><input type="text" name="r7" value="<?php echo $email; ?>" required placeholder="Enter Email"  /></td>
			</tr>
			<tr align="center">
				<th>Address:</th>
				<td><textarea placeholder="Enter Your Delivery Address" id='add' rows="2" name="r3" style="resize:none;"><?php echo $add; ?></textarea></td>
			</tr>
			<tr>
			<th>City</th>
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
				<th>Area:</th>
				<td>
					<ul>
			<li class="text-info">
			<select name="r4" id="area"   required>
            <option>Select area</option>
          </select>
			</li>
		</ul>
				</td>
			</tr>
			<tr align="center">
				<th>Payment Method:</th>
				<td>
				<select name="r6" required>
					<option>Cash on delivery</option>
					<option>Online Payment</option>
				</select>
				</td>
			</tr>
			<br />
			<tr align="center">
				<td colspan="2" align="center" ><div style="text-align:center;"><input type="submit" name="checkout" value="Continue to checkout"></div></td>
			</tr>
			
		</table>
			</form>	
			</div>
	</div>
</div>
<script type="text/javascript">
function myFun()
		{
			document.getElementById("add").value = $add;
		}
	</script>

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
<!-- //contact-page -->
		<?php
			include 'include/footer.php';
		?>

</body>
		
</html>