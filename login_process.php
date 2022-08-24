<?php
	
	include 'include/connection.php';
	error_reporting();
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

	
	if(isset($_REQUEST["submit"]))
	{
		
		$r1=$_POST['r1'];
		$r2=md5($_POST['r2']);
		$q="select username,password from user where username='$r1' and password='$r2'";
		 /*
		 extract($_POST);
		$q="select username,password from user
		where username='".mysqli_real_escape_string($con,$r1)."'
		and password='".mysqli_real_escape_string($con,$r2)."'";
		*/
		$res=mysqli_query($con,$q);
		
		
		$row=mysqli_fetch_array($res);	
			if(!empty($row))
			{
				
				$_SESSION['client']['r1']=$row['username'];
				$_SESSION['client']['status']=true;
		
				echo "<script>alert('Login Successful');</script>";
				//header('location:index.php');
				echo"<script>window.open('index.php','_self');</script>";
			}
			else
			{
			header("location:login.php");
			$_SESSION['message'] = "Username/password combination incorrect";

			}
	}
	else
	{
		header("location:login.php");
	}

?>