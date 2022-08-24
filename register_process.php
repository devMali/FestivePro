<?php
	error_reporting();
		if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

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
		$r8 = mysqli_real_escape_string($con,$_POST['r8']);
		$r9 = mysqli_real_escape_string($con,$_POST['r9']);
		$r10 = mysqli_real_escape_string($con,$_POST['r10']);
		$r11= mysqli_real_escape_string($con,$_POST['r11']);
	

		if(!preg_match("/^[a-zA-Z0-9 ]*$/", $r8) )
		{	
			header("location:register.php");
			$_SESSION['message']="Please, Enter Valid first name. ";
		}	
		else if(preg_match("/^[ ]*$/", $r8))
			{	
				header("location:register.php");
				$_SESSION['message']="Please, Enter valid first name. ";
			}
		else if(!preg_match("/^[a-zA-Z0-9 ]*$/", $r9) )
			{	
				header("location:register.php");
				$_SESSION['message']="Please, Enter Valid last name. ";
			}	
	
		else if(preg_match("/^[ ]*$/", $r9))
			{	
				header("location:register.php");
				$_SESSION['message']="Please, Enter valid last name. ";
			}
		else if(strlen($r1) < 3)
		{	
			header("location:register.php");
			$_SESSION['message']="username should be greater than 3 characters. ";
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
			$r6=md5($r6);
			
			$q="insert into user(username,password,fname,lname,sec_que,sec_ans,address,area_id,email,mobile_no,isAdmin)
			values('$r1','$r6','$r8','$r9','$r10','$r11','$r2','$r3','$r5','$r4','0')";
			mysqli_query($con,$q);
		
			if (mysqli_affected_rows($con)==1)
			{	
				$q="select username,password from user
				where username='".mysqli_real_escape_string($con,$r1)."'
				and password='".mysqli_real_escape_string($con,$r6)."'";
				$res=mysqli_query($con,$q);
		
				$row=mysqli_fetch_array($res);	
					$_SESSION['client']['r1']=$row['username'];
					$_SESSION['client']['status']=true;
			
					//header("location:index.php");
					echo "<script>alert('Account Created Successfully');</script>";
					echo"<script>window.open('index.php','_self');</script>";
				
			}
			else
			{
				header("location:register.php");
				$_SESSION['message'] = "please, enter unique Username.";
			}
					
	}
}
	else
	{
		header("location:register.php");
	}	
?>