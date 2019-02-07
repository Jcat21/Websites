<?php 
 
 	if( !isset($_POST['title']) || empty($_POST['title']) ) {
        $error = "Please fill out all required fields";
    }
    else {
        $host = "303.itpwebdev.com";
		$user = "durhamca_db_user";
		$pass = "Pokenut1!";
		$db = "durhamca_dvd_db";
 
        $mysqli = new mysqli($host, $user, $pass, $db);
        if ( $mysqli->connect_errno ) {
            echo $mysqli->connect_error;
            exit();
        }
 
        $mysqli->set_charset('utf8');

        $sql = "INSERT INTO dvd_titles (title, release_date, award, label_id, sound_id, genre_id, rating_id, format_id) 
                VALUES('" . $_POST['title'] . "'";

        if( isset($_POST['release_date']) && !empty($_POST['release_date']) ) {
        	$sql = $sql . ", '" . $_POST['release_date'] . "'";
        }
        else {
        	$sql = $sql . ", NULL";
        }

        if( isset($_POST['award']) && !empty($_POST['award']) ) {
        	$sql = $sql . ", '" . $_POST['award'] . "'";
        }
        else {
        	$sql = $sql . ", NULL";
        }

        if( isset($_POST['label']) && !empty($_POST['label']) ) {
        	$sql = $sql . ", " . $_POST['label'];
        }
        else {
        	$sql = $sql . ", NULL";
        }

        if( isset($_POST['sound']) && !empty($_POST['sound']) ) {
        	$sql = $sql . ", " . $_POST['sound'];
        }
        else {
        	$sql = $sql . ", NULL";
        }

        if( isset($_POST['genre']) && !empty($_POST['genre']) ) {
        	$sql = $sql . ", " . $_POST['genre'];
        }
        else {
        	$sql = $sql . ", NULL";
        }

        if( isset($_POST['rating']) && !empty($_POST['rating']) ) {
        	$sql = $sql . ", " . $_POST['rating'];
        }
        else {
        	$sql = $sql . ", NULL";
        }

        if( isset($_POST['format']) && !empty($_POST['format']) ) {
        	$sql = $sql . ", " . $_POST['format'];
        }
        else {
        	$sql = $sql . ", NULL";
        }

        $sql = $sql . ");";
 
        $results = $mysqli->query($sql);
        if ( !$results ) {
            echo $mysqli->error;
            exit();
        }
 
        $mysqli->close();
 
 
    }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Confirmation | DVD</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		<li class="breadcrumb-item"><a href="add_form.php">Add</a></li>
		<li class="breadcrumb-item active">Confirmation</li>
	</ol>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">Add a DVD</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">
		<div class="row mt-4">
			<div class="col-12">
				
				<?php if (isset($error) && !empty($error)) : ?>
					<div class="text-danger">
						<?php echo $error; ?>
					</div>
				<?php else : ?>
					<div class="text-success">
						DVD was successfully added.
					</div>
				<?php endif ?>

			</div> <!-- .col -->
		</div> <!-- .row -->
		<div class="row mt-4 mb-4">
			<div class="col-12">
				<a href="add_form.php" role="button" class="btn btn-primary">Back to Add Form</a>
			</div> <!-- .col -->
		</div> <!-- .row -->
	</div> <!-- .container -->
</body>
</html>