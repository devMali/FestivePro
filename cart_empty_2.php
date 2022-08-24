
<?php	
            include 'include/connection.php';
            include 'functions/functions.php';
            $user_id=user();

            $qu="select * from cart where username='$user_id'";
			$quant=mysqli_query($con,$qu);
	
			while($row=mysqli_fetch_array($quant))
			{
				$pid[]=$row['pro_id'];
				$qty[]=$row['qty'];
			}
			$x="SELECT (product.stock-cart.qty) AS val FROM product,cart WHERE product.pro_id=cart.pro_id AND cart.username='$user_id'";
			$x_run=mysqli_query($con,$x);
				
			while($row=mysqli_fetch_assoc($x_run))
			{
				$dif[]=$row['val'];
			}
	
			$array=array_combine($pid,$dif);
						
			foreach($array as $i => $q)
			{
				$up_quant="update product set stock='$q' where pro_id='$i'";
				$res=mysqli_query($con,$up_quant);
			} 
            	
			$empty_cart="delete from cart where username='$user_id'";
			$run_empty=mysqli_query($con,$empty_cart) or die(mysqli_error($con));

            echo "<script>alert('Your order is Confirmed.Thank you!');
			window.open('index.php','_self');</script>";

            //header("location:index.php");
?>