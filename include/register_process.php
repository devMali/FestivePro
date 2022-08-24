<?php
	error_reporting();
	session_start();
	include 'include/connection.php';
$msg=array();
	if (isset($_POST['submit'])) 
	{
	
		$r1 = mysqli_real_escape_string($con,$_POST['r1']);
		$r2 = mysqli_real_escape_string($con,$_POST['r2']);
		$r3 = mysqli_real_escape_string($con,$_POST['r3']);
		$r4 = mysqli_real_escape_string($con,$_POST['r4']);
		$r5 = mysqli_real_escape_string($con,$_POST['r5']);
		$r6 = mysqli_real_escape_string($con,$_POST['r6']);
		$r7 = mysqli_real_escape_string($con,$_POST['r7']);
		
	/*	$r1=isset($_POST('r1'));
		$r2=isset($_POST('r2'));
		$r3=isset($_POST('r3'));
		$r4=isset($_POST('r4'));
		$r5=isset($_POST('r5'));
		$r6=isset($_POST('r6'));
		$r7=isset($_POST('r7'));*/


		if(!preg_match("/^[a-zA-Z0-9 ]*$/", $r1) )
		{	
			header("location:register.php");
			$_SESSION['message']="Please, Enter Valid Name. ";
		}	
			else if(preg_match("/^[ ]*$/", $r1))
			{	
				header("location:register.php");
				$_SESSION['message']="Please, Enter valid Name. ";
			}
		else if(strlen($r1) < 3)
		{	
			header("location:register.php");
			$_SESSION['message']="Please, Name should be greater than 3 characters. ";
		}	
			else if(preg_match("/^[ ]*$/", $r2))
			{	
				header("location:register.php");
				$_SESSION['message']="Please, Enter valid Address. ";
			}
			else if(strlen($r2) < 15)
			{	
				header("location:register.php");
				$_SESSION['message']="Please, Enter proper Address. ";
			}
		
			else if(! is_numeric($r4) || strlen($r4)!=10)
			{
				header("location:register.php");
				$_SESSION['message']="Please, Enter Valid Mobile Number. ";
			}
			else if(!filter_var($r5, FILTER_VALIDATE_EMAIL))
			{
				header("location:register.php");
				$_SESSION['message']="Please, Enter Valid E-mail Address. ";
			}
			else if(strlen($r6) < 6)
			{
				header("location:register.php");
				$_SESSION['message']="Passwords must be at least 6 characters. ";
			}		
			else if ($r6 != $r7) 
			{	header("location:register.php");
				$_SESSION['message'] = "The two passwords do not match";
			}	
		else 
		{
			$q="insert into registration(User_name,Address,City_id,Phone_no,Email,Password)
			values('$r1','$r2','$r3','$r4','$r5','$r6')";
			mysqli_query($con,$q);
		
			if (mysqli_affected_rows($con)==1)
			{	
				$q="select User_name,Password from registration
				where User_name='".mysqli_real_escape_string($con,$r1)."'
				and Password='".mysqli_real_escape_string($con,$r6)."'";
				$res=mysqli_query($con,$q);
		
				$row=mysqli_fetch_array($res);	
					$_SESSION['client']['r1']=$row['User_name'];
					$_SESSION['client']['status']=true;
			
					header("location:index.php");
				
			}
			else
			{
				header("location:register.php");
				$_SESSION['message'] = "please, enter unique details.";
			}
		}			
	}
	else
	{
		header("location:register.php");
	}	
?>