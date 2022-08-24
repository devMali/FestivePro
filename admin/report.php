		<!-- header-starts -->
<?php session_start();
error_reporting();
include 'include/connection.php';
if(! isset($_SESSION['client']['status']))
{
	header("location:../login.php");
}

?>
<!--main-->
<!DOCTYPE HTML>
<html>
<head>
<title>FestoFest</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<script src="js/amcharts.js"></script>	
<script src="js/serial.js"></script>	
<script src="js/light.js"></script>	
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/admin-query.js"></script>
<script language="JavaScript" >
  function getproduct()
   {
     var cid=document.f1.r2.value;
	 var xmlhttp = new XMLHttpRequest();
		 xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("productdiv").innerHTML = this.responseText;
            }
         };		
       xmlhttp.open("GET","getproduct.php?cid="+cid,true);
	   xmlhttp.send();	  
   }
</script>
<script language="JavaScript" >
  function getorder()
   {
     var oid=document.f2.r1.value;
	 var xmlhttp = new XMLHttpRequest();
		 xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("orderdiv").innerHTML = this.responseText;
            }
         };		
       xmlhttp.open("GET","getorder.php?oid="+oid,true);
	   xmlhttp.send();	  
   }
</script>
<script language="JavaScript" >
  function getuser()
   {
     var uid=document.f3.r3.value;
	 var xmlhttp = new XMLHttpRequest();
		 xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("userdiv").innerHTML = this.responseText;
            }
         };		
       xmlhttp.open("GET","getuser.php?uid="+uid,true);
	   xmlhttp.send();	  
   }
</script>
<script language="JavaScript" >
  function getopro()
   {
     var oproid=document.f4.r4.value;
	 var xmlhttp = new XMLHttpRequest();
		 xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("oprodiv").innerHTML = this.responseText;
            }
         };		
       xmlhttp.open("GET","getopro.php?oproid="+oproid,true);
	   xmlhttp.send();	  
   }
</script>
<script language="JavaScript">  
      function getdate()
   {

	     var to=document.f5.t1.value;
	     var f=document.f5.t2.value;
		
		 var xmlhttp = new XMLHttpRequest();
		 
		   xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				
                document.getElementById("datediv").innerHTML = this.responseText;
            }
        };
	
        xmlhttp.open("GET","getdate.php?to="+to+"&"+"from="+f,true);
        xmlhttp.send();
		  
   }
</script>
<script language="JavaScript" >
  function getco()
   {
     var coid=document.f6.r6.value;
	 var xmlhttp = new XMLHttpRequest();
		 xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("codiv").innerHTML = this.responseText;
            }
         };		
       xmlhttp.open("GET","getco.php?coid="+coid,true);
	   xmlhttp.send();	  
   }
</script>
</head> 
<body>
   <div class="page-container">
	<div class="left-content">
	   <div class="inner-content">
	
<script type="text/javascript">
function searchSite(){
    var inputted=document.getElementById("searchinput").value;
    var searchForm=document.getElementById("searchForm");
  searchForm.action="http://localhost/gretong-web/admin/";
  searchForm.submit();
}
</script>
<div class="header-section">
			<!-- top_bg -->
						<div class="top_bg">
							<div class="header_top">
<!--<div class="top_right" style="font-family: 'Montserrat', sans-serif; text-transform:uppercase; font-size:13px">
<span style="margin-right: 0px; padding: 1px 10px; background: url(../images/phon.png) no-repeat 4px 2px;
  -webkit-transition: all 0.3s ease-in-out; -moz-transition: all 0.3s ease-in-out; -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;"></span> 
  						Call us : 032 2352 782
									</div>-->
									<div class="top_left">
										<h2>
WELCOME	
<a style="color:#4299a7; text-transform:uppercase;"><b><?php echo $_SESSION['admin']['r1']; ?></b></a>&emsp;|&emsp; 
<a href="logout.php"  style="color:#4299a7;"><b><u>LOGOUT</u></b></a>
									</h2>
									</div>
										<div class="clearfix"> </div>
								</div>
						</div>
					<div class="clearfix"></div>
				<!-- /top_bg -->
				</div>
				<div class="header_bg">
							<div class="header">
								<div class="head-t">
									<!--<div class="logo">
					<a href="index.php"><img src="include/logo.png" class="img-responsive" alt=""> </a>
									</div>-->
										<!-- start header_right -->
									<div class="header_right">
										<div class="rgt-bottom">
											<div class="reg">
											</div>
										<div class="clearfix"> </div>
									</div>
									<!--<div class="search">
										<form id="searchForm"> 
											<input type="text" value="" placeholder="search..." id="searchinput">
											<input type="submit" onclick="searchSite()" value="">
										</form>
									</div>-->
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
				</div>
					<!-- //header-ends -->
				
				<!--content-->
			<div class="content">
					<div class="monthly-grid">
					
						<div class="panel panel-widget">
<style type="text/css">
#userdiv h3, #productdiv h3, #datediv h3, #oprodiv h3, #codiv h3, #orderdiv h3 {
color: #816263;
}
table{ border:thick;}
th,td{ text-align:left;}
</style>
<div class="tab-main">
	<!--/tabs-inner-->
	<div class="tab-inner">
		<div id="tabs" class="tabs">
			<!--<h2 class="inner-tittle">Responsive Horizontal Tabs </h2>-->
				<div class="graph">
<nav>
<ul>
	<li class="tab-current"><a href="#section-1" class="icon-shop"><span>Customers</span></a></li>
	<li><a href="#section-2" class="icon-cup"><span>Products</span></a></li>
	<li><a href="#section-3" class="icon-food"><span>Order</span></a></li>
	<li><a href="#section-4" class="icon-lab"><span>Order_Status</span></a></li>
	<li><a href="#section-5" class="icon-truck"><span>Order_Date</span></a></li>
	<li><a href="#section-6" class="icon-truck"><span>Order_Customer</span></a></li>
</ul>
</nav>
<div class="content tab">
	<section id="section-1" class="content-current">
		<div class="mediabox">
			<!--<i class="fa fa-shopping-cart"></i>-->
<h3 style="color: #816263">Customer Report By City</h3>
<?php
$sc=mysqli_query($con,"select *from city_details");
?>

<form action="" method="post" name="f3">
    <div class="form-group">
      <select class="form-control" name="r3" placeholder="select Design" onChange="getuser();">
			<option>Select City</option> 
        <?php
			while($row=mysqli_fetch_array($sc))
			{
		?>
				<option value='<?php echo $row["City_id"]; ?>'><?php echo $row["City_name"];?></option>
			<?php
			}
		?>
      </select>
      <br>
	</div>  
</form>
<div id="userdiv">  
</div>

		</div>
	</section>

	<section id="section-2">
		<div class="mediabox">
			<!--<i class="fa fa-suitcase"></i>-->
<h3 style="color:#816263">Product Report By Category</h3>
<?php
$sc=mysqli_query($con,"select *from Category");
$ss=mysqli_query($con,"select *from SubCategory");
?>

<form action="" method="post" name="f1">
    <div class="form-group">
      <select class="form-control" name="r2" placeholder="select Design" onChange="getproduct();">
			<option>Select Category</option> 
        <?php
			while($row0=mysqli_fetch_array($ss))
			{
		?>
				<option value='<?php echo $row0["SubCategory_id"]; ?>'><?php echo $row0["SubCategory_name"];?></option>
			<?php
			}
		?>
      </select>
      <br>
	</div>  
</form>
<div id="productdiv">  
</div>
	</div>
	</section>
	
	<section id="section-3">
		<div class="mediabox">
			<!--<i class="fa fa-sitemap"></i>-->
<h3 style="color:#816263">Customer Order Report By Product</h3>
<?php
$sopro=mysqli_query($con,"select *from Product_details");
?>

<form action="" method="post" name="f4">
    <div class="form-group">
      <select class="form-control" name="r4" placeholder="select Design" onChange="getopro();">
			<option>Select Product</option> 
        <?php
			while($row=mysqli_fetch_array($sopro))
			{
		?>
				<option value='<?php echo $row["Product_id"]; ?>'><?php echo $row["Product_name"];?></option>
			<?php
			}
		?>
      </select>
      <br>
	</div>  
</form>
<div id="oprodiv">  
</div>

		</div>
	</section>
	
	<section id="section-4">
		<div class="mediabox">
			<!--<i class="fa fa-sitemap"></i>-->
<h3 style="color:#816263">Customer Order Report By Order Status</h3>
<?php
$sp=mysqli_query($con,"select *from Payment_details where Payment_status='Pending'");
$row=mysqli_fetch_array($sp);

$sp1=mysqli_query($con,"select *from Payment_details where Payment_status='Complete'");
$row1=mysqli_fetch_array($sp1);
?>
<form action="" method="post" name="f2">
    <div class="form-group">
      <select class="form-control" name="r1" placeholder="select Design" onChange="getorder();">
			<option>Select Status</option>
			<option value="<?php echo $row['Payment_status']; ?>">Pending</option>
			<option value="<?php echo $row1['Payment_status']; ?>">Complete</option>
      </select>
      <br>
<div id="orderdiv">  
</div>	  
	</div>  
</form>

		</div>
	</section>		
	
	<section id="section-5">
		<div class="mediabox">
			<!--<i class="fa fa-sitemap"></i>-->
<h3 style="color:#816263">Customer Order Report By Date</h3>
	<form action="" name="f5" method="post" onReset="return change();">
	   <div class="form-group" align="center">
    		TO<input type="date" name="t1" class="form-control" style="width:400px">
	   </div>
	   <div class="form-group" align="center">
    		From<input type="date" name="t2" class="form-control" style="width:400px">
	   </div>
  <button type="button" class="btn btn-default"  onclick="getdate()">Report</button>
  <button type="reset" class="btn btn-default">Cancel</button>
</form>
<div id="datediv"></div>

		</div>
	</section>		
	
	<section id="section-6">
		<div class="mediabox">
			<!--<i class="fa fa-sitemap"></i>-->
<h3 style="color:#816263">Order Report By Customer</h3>
<?php
$sr=mysqli_query($con,"select *from registration");
?>

<form action="" method="post" name="f6">
    <div class="form-group">
      <select class="form-control" name="r6" placeholder="select Design" onChange="getco();">
			<option>Select Customer</option> 
        <?php
			while($row=mysqli_fetch_array($sr))
			{
		?>
				<option value='<?php echo $row["User_id"]; ?>'><?php echo $row["User_id"]; ?>.
				<?php echo $row["User_name"];?></option>
			<?php
			}
		?>
      </select>
      <br>
	</div>  
</form>
<div id="codiv">  
</div>

		</div>
	</section>

			</div><!-- /content -->
		</div>
		<!-- /tabs -->
	</div>
</div>	
<script src="js/cbpFWTabs.js"></script>
	<script>
		new CBPFWTabs( document.getElementById( 'tabs' ) );
	</script>

							
							<div class="panel-body">
								<!-- status -->
								<div class="contain">	
									<div class="gantt"></div>
								</div>
								<!-- status -->
							</div>
						</div>
					
					
					</div>
			
						<!--//area-->
							<!--tasks-->
							<!--latest products-->
					<div class="content-top">
						
		<!--realtime updates-->
		<!--chrome safari	-->	
		<!--area-->					
				<div class="area">
					
					<!--linemulti chart-->
					<!--stackedbar chart-->
						<!--//area-->
		<!--<div class="fo-top-di">-->
			<!--footer-starts-->
				<div style="margin-top:250px">
			<?php
				include_once 'include/footer.php';
			?>
				</div>			

			<!--footer-ends-->
		<!--</div>-->
			</div>
			<!--content-->
		</div>
</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<!--slidebar-starts-->
			<?php
				include_once 'include/slidebar.php';
			?>
				<!--slidebar-ends-->
