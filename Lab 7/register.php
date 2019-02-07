<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Confirmation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-5 mb-3">Confirmation</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	
	<div class="container">

		<div class="row mt-3">
			<div>
				This form was submitted on Wednesday, March 07, 2018 at 12:11:43 PM.
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-4 text-right">Full Name:</div>
			<div class="col-8">
				<!-- PHP Output Here -->
				<?php
					if( isset($_POST['fname']) && !empty($_POST['fname']) ) {
						if( isset($_POST['lname']) && !empty($_POST['lname']) ) {
							echo $_POST['fname']; echo " "; echo $_POST['lname'];
						}
						else {
							echo "<div style='Color: red;'>Last name not provided.</div>";
						}
					}
					else {
						echo "<div style='Color: red;'>First name not provided.</div>";
					}
				?>
			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-4 text-right">Email:</div>
			<div class="col-8">
				<!-- PHP Output Here -->
				<?php
					if( isset($_POST['email']) && !empty($_POST['email']) ) {
						echo $_POST['email'];
					}
					else {
						echo "<div style='Color: red;'>Not provided.</div>";
					}
				?>
			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-4 text-right">Phone:</div>
			<div class="col-8">
				<!-- PHP Output Here -->
				<?php
					if( isset($_POST['phone']) && !empty($_POST['phone']) ) {
						echo $_POST['phone'];
					}
					else {
						echo "<div style='Color: red;'>Not provided.</div>";
					}
				?>
			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-4 text-right">Gender:</div>
			<div class="col-8">
				<!-- PHP Output Here -->
				<?php
					if( isset($_POST['gender']) && !empty($_POST['gender']) ) {
						echo $_POST['gender'];
					}
					else {
						echo "<div style='Color: red;'>Not provided.</div>";
					}
				?>
			</div>
		</div> <!-- .row -->
		<div class="row mt-3">
			<div class="col-4 text-right">Password Match:</div>
			<div class="col-8">
				<!-- PHP Output Here -->
				<?php
					if( isset($_POST['pass']) && !empty($_POST['pass']) ) {
						if( $_POST['pass'] === $_POST['pass-confirm'] ) {
							echo "<div style='Color: green;'>Passwords match</div>";
						}
						else {
							echo "<div style='Color: red;'>Passwords do not match</div>";
						}
					}
					else {
						echo "<div style='Color: red;'>Not provided.</div>";
					}
				?>
			</div>
		</div> <!-- .row -->

		<div class="row mt-3">
			<div class="col-4 text-right">Verification Method:</div>
			<div class="col-8">
				<!-- PHP Output Here -->
				<?php
					if( isset($_POST['verification-method']) && !empty($_POST['verification-method']) ) {
						echo $_POST['verification-method'];
					}
					else {
						echo "<div style='Color: red;'>Not provided.</div>";
					}
				?>
			</div>
		</div> <!-- .row -->

		<div class="row mt-3">
			<div class="col-4 text-right">Terms & Conditions:</div>
			<div class="col-8">
				<!-- PHP Output Here -->
				<?php
					if( isset($_POST['terms-accepted']) && !empty($_POST['terms-accepted']) ) {
						echo "<div style='Color: green;'>Accepted</div>";
					}
					else {
						echo "<div style='Color: red;'>Not accepted</div>";
					}
				?>
			</div>
		</div> <!-- .row -->

		<div class="row mt-4 mb-4">
			<a href="form.php" role="button" class="btn btn-primary">Back to Form</a>
		</div> <!-- .row -->

	</div> <!-- .container -->

</body>
</html>