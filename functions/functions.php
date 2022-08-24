<?php
include ('include\connection.php');
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 



//get category function
function category()
{
global $con;
		$get_cats="select * from category";
		$run_cats=mysqli_query($con,$get_cats);
			while($row_cats=mysqli_fetch_array($run_cats))
			{
				$cat_id=$row_cats["cat_id"];
				$cat_name=$row_cats["cat_name"];
				
				echo "<li><a href='products.php?Cat=$cat_id'>$cat_name</a></li>";
				
			}

}

//get subcategory function

function subCategory()
{
global $con;

		$get_subCats="select * from subcategory s,category c where s.Cat_id=c.Cat_id";
		$run_subCats=mysqli_query($con,$get_subCats);
			while($row_subCats=mysqli_fetch_array($run_subCats))
			{
				$subCat_id=$row_subCats["Sub_id"];
				$subCat_name=$row_subCats["Sub_name"];

				echo "<li><a href='products.php?subCat=$subCat_id'>$subCat_name</a></li>";
			}
}
//start menu category function
function getCat()
{
	global $con;
		$get_cats="select * from category";
		$run_cats=mysqli_query($con,$get_cats);
			while($row_cats=mysqli_fetch_array($run_cats))
			{
				$cat_id=$row_cats["Cat_id"];
				$cat_name=$row_cats["Cat_name"];
				
				echo "<h6>$cat_name</h6>";
														
		$get_subCats="select * from Subcategory  where Cat_id=$cat_id";
		$run_subCats=mysqli_query($con,$get_subCats);
			while($row_subCats=mysqli_fetch_array($run_subCats))
			{
				$subCat_id=$row_subCats["Sub_id"];
				$subCat_name=$row_subCats["Sub_name"];
				
				echo "<li><a href='index.php?subCat=$subCat_id'>$subCat_name</a></li>";
			}

			}
									
}
//end get category function

//start get products function
function getPro()
{
global $con;

if(!isset($_GET['subCat']))
	{
	$get_prod="select * from product order by rand() LIMIT 0,5";					
	$run_prod=mysqli_query($con,$get_prod);
	while($row_prod=mysqli_fetch_array($run_prod))
	{
		$pro_id=$row_prod['pro_id'];
		$pro_name=$row_prod['pro_name'];
		$pro_price=$row_prod['pro_price'];		
		$pro_de=$row_prod['pro_desc'];	
		$pro_unit=$row_prod['unit_id'];
		
		$get_pic="select i.* from image i,product p where p.pro_id='$pro_id' and p.pro_id=i.pro_id";	
			$run_pic=mysqli_query($con,$get_pic);

			while($row_pic=mysqli_fetch_array($run_pic))
			{
				$pro_im=$row_pic['image_name'];
			}
				echo "	<div class='col-md-4 product simpleCart_shelfItem text-center'>
						<a href='#'><img src='images/$pro_im' alt='' /></a>
						<div class='mask'>
							<a href='details.php?pro_id=$pro_id'>Quick View</a>
						</div>
						<a class='product_name' href='details.php?pro_id=$pro_id'>$pro_name</a>
						<p><a class='item_add' href='index.php?add_cart=$pro_id'><i> </i> <span class='item_price'>&#x20B9;$pro_price</span></a></p>
						</div>";
					
	}
	}
}
//end get products function

//start get sub category products function

function getCatPro()
{
global $con;

if(isset($_GET['Cat']))
	{
		
	$cat=$_GET['Cat'];
												
	$get_subCats="select * from subcategory where cat_id=$cat";
	$run_subCats=mysqli_query($con,$get_subCats);
	while($row_subCats=mysqli_fetch_array($run_subCats))
	{
		
		$subCat_id=$row_subCats["sub_id"];
		$subCat_name=$row_subCats["sub_name"];
						
		$get_cat_prod="select * from product where sub_id='$subCat_id'";					
		$run_cat_prod=mysqli_query($con,$get_cat_prod);
		while($row_cat_prod=mysqli_fetch_array($run_cat_prod))
		{
			$pro_id=$row_cat_prod['pro_id'];
			$pro_name=$row_cat_prod['pro_name'];
			$pro_price=$row_cat_prod['pro_price'];		
			$pro_de=$row_cat_prod['pro_desc'];	
			$pro_unit=$row_cat_prod['unit_id'];
			
			$get_pic="select i.* from image i,product p where p.pro_id='$pro_id' and p.pro_id=i.pro_id";	
			$run_pic=mysqli_query($con,$get_pic);

			while($row_pic=mysqli_fetch_array($run_pic))
			{
				$pro_im=$row_pic['image_name'];
			}
			//echo"$pro_im,$pro_id";
			echo "<div class='col-md-4 product simpleCart_shelfItem text-center'>
			<a href='#'><img src='images/$pro_im' alt='Nothing'/></a>
			<div class='mask'>
				<a href='details.php?pro_id=$pro_id'>Quick View</a>
			</div>
			<a class='product_name' href='details.php?pro_id=$pro_id'>$pro_name</a>
			<p><a class='item_add' href='index.php?add_cart=$pro_id'><i> </i> <span class='item_price'>&#x20B9;$pro_price</span></a></p>
			</div>";
			
		}
		
	}
	}
}



//start get sub category products function
function getSubPro()
{
global $con;

if(isset($_GET['subCat']))
	{
	$subCat_id = $_GET['subCat'];
	$get_cat_prod="select * from product where sub_id='$subCat_id'";					
	$run_cat_prod=mysqli_query($con,$get_cat_prod);
	$count = mysqli_num_rows($run_cat_prod);
	if($count==0)
	{
		echo "<h2> NO Products found!</h2>";
	}
	while($row_cat_prod=mysqli_fetch_array($run_cat_prod))
	{
			$pro_id=$row_cat_prod['pro_id'];
			$pro_name=$row_cat_prod['pro_name'];
			$pro_price=$row_cat_prod['pro_price'];		
			$pro_de=$row_cat_prod['pro_desc'];	
			$pro_unit=$row_cat_prod['unit_id'];

			$get_pic="select i.* from image i,product p where p.pro_id='$pro_id' and p.pro_id=i.pro_id";	
			$run_pic=mysqli_query($con,$get_pic);

			while($row_pic=mysqli_fetch_array($run_pic))
			{
				$pro_im=$row_pic['image_name'];
			}
		
				echo "	<div class='col-md-4 product simpleCart_shelfItem text-center'>
						<a href='#'><img src='images/$pro_im' alt='' /></a>
						<div class='mask'>
							<a href='details.php?pro_id=$pro_id'>Quick View</a>
						</div>
						<a class='product_name' href='details.php?pro_id=$pro_id'>$pro_name</a>
						<p><a class='item_add' href='index.php?add_cart=$pro_id'><i> </i> <span class='item_price'>&#x20B9;$pro_price</span></a></p>
						</div>";
					
	}
	}
}
//end get sub category products function

//start get newest products function
/* function newest()
{
global $con;
if(isset($_GET['newa']))
	{
	$get_prod="select * from product order by Product_date limit 6";					
	$run_prod=mysqli_query($con,$get_prod);
	while($row_cat_prod=mysqli_fetch_array($run_prod))
	{
		$pro_id=$row_cat_prod['Product_id'];
		$pro_name=$row_cat_prod['Product_name'];
		$pro_im=$row_cat_prod['Image'];				
		$pro_de=$row_cat_prod['Description'];	
		$pro_unit=$row_cat_prod['Unit_id'];
		$pro_price=$row_cat_prod['Product_price'];		

				echo "	<div class='col-md-4 product simpleCart_shelfItem text-center'>
						<a href='#'><img src='admin/images/$pro_im' alt='' /></a>
						<div class='mask'>
							<a href='details.php?pro_id=$pro_id'>Quick View</a>
						</div>
						<a class='product_name' href='details.php?pro_id=$pro_id'>$pro_name</a>
						<p><a class='item_add' href='index.php?add_cart=$pro_id'><i> </i> <span class='item_price'>&#x20B9;$pro_price</span></a></p>
						</div>";	
	}
	}
}
//end get newest products function

//start get best products function
function best()
{
global $con;
if(isset($_GET['be_pro']))
	{
	$get_prod="select *from product_details order by Product_price DESC limit 6";					
	$run_prod=mysqli_query($con,$get_prod);
	while($row_cat_prod=mysqli_fetch_array($run_prod))
	{
		$pro_id=$row_cat_prod['Product_id'];
		$pro_name=$row_cat_prod['Product_name'];
		$pro_im=$row_cat_prod['Image'];				
		$pro_de=$row_cat_prod['Description'];	
		$pro_unit=$row_cat_prod['Unit_id'];
		$pro_price=$row_cat_prod['Product_price'];		

				echo "	<div class='col-md-4 product simpleCart_shelfItem text-center'>
						<a href='#'><img src='admin/images/$pro_im' alt='' /></a>
						<div class='mask'>
							<a href='details.php?pro_id=$pro_id'>Quick View</a>
						</div>
						<a class='product_name' href='details.php?pro_id=$pro_id'>$pro_name</a>
						<p><a class='item_add' href='index.php?add_cart=$pro_id'><i> </i> <span class='item_price'>&#x20B9;$pro_price</span></a></p>
						</div>";	
	}
	}
} */
//end get newest products function

// start Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
// end Function to get the client IP address

// start Function to get the user
function user()
{
	global $con;
	$user_id='';
	if(isset($_SESSION['client']['status']))
	{
	$user = $_SESSION['client']['r1'];
	$q="select username from user where	username='$user'";
	$run=mysqli_query($con,$q);
	while($row=mysqli_fetch_array($run))
	{
		$user_id=$row['username'];
	}	
	return $user_id;
	}
}			
// end Function to get the user

// start defaults for user
function getDefault()
{
global $con;
$c=user();
	$get_c="select * from user where username='$c'";
	$run_c=mysqli_query($con,$get_c);
	while($row_c=mysqli_fetch_array($run_c))
	{
		$customer_id=$row_c['username'];
		
	}
	if(isset($_SESSION['client']['status']))
	{
		if(!isset($_GET['my_orders']) && !isset($_GET['ret_orders']) && !isset($_GET['edit_account']) && !isset($_GET['change_pass']) 
			&& !isset($_GET['delete_account'])  && !isset($_GET['My_Wishlist']))
		{
$get_orders="select * from payment_details where username='$customer_id' AND pay_status='Pending'";
		$run_orders=mysqli_query($con,$get_orders);
		$count_orders=mysqli_num_rows($run_orders);
			if($count_orders > 0)
			{
				echo "<h1>Hey! $c</h1>
				<h2> You have ($count_orders) Pending Order(s) </h2>
<h3> <a href='my_account.php?my_orders' style='text-decoration:underline;'>Click here to see your orders</a> </h3>";
			}
			else
			{
				echo "<h1>Hey! $c</h1>
				<h2> You have no Pending Order(s) </h2>
<h3> <a href='my_account.php?my_orders' style='text-decoration:underline;'>Click here to see your orders history</a> </h3>";
			}
		
		}
	}
	else
	{
		echo "<h1>Please Login to check your account details.</h1>
		<script>window.open('login','_self');</script>			";
	}
}

// end defaults for user

// start Function to get cart
function cart()
{
global $con;

if(isset($_GET['add_cart']))
{
$user_id=user();
if( isset($_SESSION['client']['status']))
{
	$user_id=user();
	$p_id=$_GET['add_cart'];
	
	$check_pro="select * from cart where username='$user_id' AND pro_id='$p_id'";
	$run_check=mysqli_query($con,$check_pro);
	if(mysqli_num_rows($run_check)>0)
	{
		echo "<script> alert('Selected product is already into cart!!');window.open('".$_SERVER['HTTP_REFERER']."','_self'); </script>";
		
	}
	else
	{
	$pro_price="select * from product where pro_id='$pro_id'";
		$run_pro_price=mysqli_query($con,$pro_price);
		while($p_price=mysqli_fetch_array($run_pro_price))
		{
					$pq=$p_price['stock'];
					
		}
		if($pq<0)
		{
					 echo "<script>alert('Sorry product is out of stock');
					 window.open('index.php');</script>";
		}
		else
		{
		$q="insert into cart(pro_id,username,qty) values('$p_id','$user_id',1)";
		$run_q=mysqli_query($con,$q) or die (mysqli_error($con));

		$q="delete from wishlist where pro_id='$p_id' and username='$user_id'";
		$run=mysqli_query($con,$q);
		

		echo "<script>alert('Product is moved in your shopping cart');
		window.open('".$_SERVER['HTTP_REFERER']."','_self');</script>";
		}
	}

}
	else
	{
		echo "<script>alert('Login to access your cart');
		window.open('".$_SERVER['HTTP_REFERER']."','_self');</script>";
	}
}
}

// end Function to get cart

//getting the no of items from cart
function items()
{
global $con;
if(isset($_GET['add_cart']))
{
	$user_id=user();

	$get_items="select * from cart where username='$user_id'";
	$run_items=mysqli_query($con,$get_items);
	$count_items=mysqli_num_rows($run_items);
}
else
{
	$user_id=user();

	$get_items="select *from cart where username='$user_id'";
	$run_items=mysqli_query($con,$get_items);
	$count_items=mysqli_num_rows($run_items);
}
	echo $count_items;
}
//end getting the no of items from cart

//getting the no of price from cart
function total_price()
{
$user_id=user();
global $con;
	$total = 0;
	$sel_price="select *  from cart where username='$user_id'";
	$run_price=mysqli_query($con,$sel_price);
	while($record=mysqli_fetch_array($run_price))
	{
		$pro_id=$record['pro_id'];
		$quantity=$record['qty'];
				
		$pro_price="select * from product where pro_id='$pro_id'";
		$run_pro_price=mysqli_query($con,$pro_price);
		while($p_price=mysqli_fetch_array($run_pro_price))
		{
			$product_price=array($p_price['pro_price']);
			$values=array_sum($product_price);
			$total += $values*$quantity;
		}
	}
	echo $total;
}
//end getting the no of price from cart

?>