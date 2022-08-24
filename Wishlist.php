<?php
include ('include/connection.php');
include ('functions/functions.php');

if(isset($_GET['my_fvrt']))
{
$user_id=user();
if( isset($_SESSION['client']['status']))
{
	$user_id=user();
	$p_id=$_GET['my_fvrt'];
	
	$check_pro="select * from wishlist where username='$user_id' AND pro_id='$p_id'";
	$run_check=mysqli_query($con,$check_pro);
	if(mysqli_num_rows($run_check)>0)
	{
		echo "<script> alert('Selected product is already added to Wishlist!!');window.open('".$_SERVER['HTTP_REFERER']."','_self'); </script>";
		
	}
	else
	{
		$q="insert into wishlist(pro_id,username,wdate) Values('$p_id','$user_id',NOW())";
		$run_q=mysqli_query($con,$q);

		echo "<script>alert('Product is moved in My Wishlits');

		window.open('".$_SERVER['HTTP_REFERER']."','_self');</script>";
	}
	

}
	else
	{
		echo "<script>alert('Please login first');
		window.open('".$_SERVER['HTTP_REFERER']."','_self');</script>";
	}
}

?>