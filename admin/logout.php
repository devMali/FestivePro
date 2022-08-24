<?php
	session_start();
	session_destroy();
	include 'include/connection.php';
	
	header("location:../index.php");
?>