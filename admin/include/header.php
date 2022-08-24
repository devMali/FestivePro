<?php session_start();
error_reporting();
if(! isset($_SESSION['client']['status']))
{
	header("location:../login.php");
}

?>
<!--main-->
<!DOCTYPE HTML>
<html>
<head>
<title>FestivePro</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<link href="include/table.css" rel="stylesheet" style="text/css">
<script src="js/amcharts.js"></script>	
<script src="js/serial.js"></script>	
<script src="js/light.js"></script>	
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/admin-query.js"></script>
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
			<div style="color:white;float:left;margin-left:40px;font-size:13px;">
			<a href="manage.php"><p style="color:red; text-transform:uppercase;"><b>change password</b></p></a>
			</div>
			
									<div class="top_left">
										<h2>
WELCOME	
<a style="color:red; text-transform:uppercase;"><b><?php echo $_SESSION['client']['r1']; ?></b></a>&emsp;|&emsp; 
<a href="logout.php"  style="color:red;"><b><u>LOGOUT</u></b></a>
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