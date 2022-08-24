	<!-- header-section-starts -->
	<?php
	
		
		include 'include/header.php';
		include 'include/connection.php';
	?>
	<!-- header-section-ends -->	
<!-- contact-page -->
<div class="contact">
	<div class="container">


		<div class="contact-form">
			<div class="contact-info">
				<h3>CONTACT US</h3>
				<h1 style="font-size:25px; text-align:center;">
				Email us with any questions or inquiries or call 1234 5678 910.<br />
				We would be happy to answer your questions. </h1>
			</div>
<?php
if(isset($_REQUEST['submit']))
{
extract($_POST);

$q = "insert into complaint(username,Email,subject,message,date) values('$r1','$r2','$r3','$r4',NOW())";
$run = mysqli_query($con,$q) or die(mysqli_error($con));
/*$to = $r2;
$subject = "Response from FestoFest";
$message = 'Mr/Ms '.$r1.'<'.$r2.'>'.',Thank you for contacting us.
We have received your enquiry and will respond to you within 24 hours. For urgent enquiries please call us on the telephone number below.

Phone No:1800 889 9999';
$headers = "From: FestoFest<festofest.com@gmail.com>";
mail($to, $subject, $message, $headers);*/
	if($run)
	{
	echo "<script>alert('Your Message has been sent! Thanks, for Contact US!');
		windw.open('contact.php','_self');</script>";
	}
	else
	{
	echo "<script>alert('Please Try again later!');
		windw.open('contact.php','_self');</script>";
	}
}
?>
			<form action="contact" method="post">
				<div class="contact-left">
					<input type="text" placeholder="Name" name="r1" pattern="[A-Za-z ]{3,50}" title="Must contain atleast 3 characters and no special symbols"  required>
					<input type="email" placeholder="E-mail" name="r2" required>
					<input type="text" placeholder="Subject" pattern="{5,50}" title="Must contain atleast 5 characters" name="r3" required>
				</div>
				<div class="contact-right">
					<textarea placeholder="Message" name="r4" pattern="{10,500}" title="Must contain atleast 10 characters" required></textarea>
				</div>
				<div class="clearfix"></div>
				<input type="submit" name="submit" value="SUBMIT">
			</form>
		</div>
	</div>
</div>
<!-- //contact-page -->
		<?php
			include 'include/footer.php';
		?>
</body>
</html>