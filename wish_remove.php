<?php

include 'include/connection.php';
include 'functions/functions.php';

$pro_id=$_GET['re'];

$user_id=user();


$q="delete from wishlist where pro_id='$pro_id' and username='$user_id'";
$run=mysqli_query($con,$q);

?>
<script>alert('Product removed');</script>";<?php
  
    header("location:index.php");
    header("location:my_account.php");
    
//    header("location:MyWishlist.php");
 
?>