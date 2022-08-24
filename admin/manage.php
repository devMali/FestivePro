		<!-- header-starts -->
        <style type="text/css">
* {
    box-sizing: border-box;
}

input[type=file], input[type=text], input[type=number], input[type=password], input[type=email], select, textarea{
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 1px 10px;
    box-sizing: border-box;
    resize: vertical;
	caret-color:#b52e31;
	color:#333333;
	white-space:initial;
}
input[type=submit]{
	color:#006633;
	width:40%;
}
table {
    border-collapse: collapse;
    width:80%;
	border:thin;
	border-color:#999999;
	}
td {
	color:#816263;
    background-color:#F5F5F5;
    padding: 8px;
	text-align:center;
	overflow:hidden;
}

</style>    
        <?php
				include_once 'include/header.php';
			?>
					<!-- //header-ends -->
				
				<!--content-->
			<div class="content">
					<div class="monthly-grid">
					
						<div class="panel panel-widget">
							<div class="panel-title">
                                <form action="manage2" method="post">
                                    <center><h3>Change Password</h3></center>
                                    <table align="center">
		<tr>
			<td>Enter Current Password:</td>
			<td><input type="password" placeholder="Enter current password:" name="r1" autofocus required  /></td>	
		</tr>
		<tr>
			<td>Enter New Password:</td>
			<td><input type="password" placeholder="At least 6 characters:" name="r2" required  /></td>	
		</tr>
		<tr>
			<td>Enter New Password Again:</td>
			<td><input type="password" placeholder="Retype password:" name="r3" required  /></td>	
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="Update Now"  /></td>
		</tr>

	</table>
                                </form>
							</div>
                            
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
				<div style="margin-top:310px">
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
