<?php 
 
 	if( !isset($_POST['home_team']) || empty($_POST['home_team']) || !isset($_POST['away_team']) || empty($_POST['away_team']) || !isset($_POST['venue']) || empty($_POST['venue']) || !isset($_POST['day']) || empty($_POST['day']) || !isset($_POST['date']) || empty($_POST['date']) ) {
        $error = "Please fill out all required fields";
    }
    else {
        $host = "303.itpwebdev.com";
		$user = "durhamca_db_user";
		$pass = "Pokenut1!";
		$db = "durhamca_a7_football_db";
 
        $mysqli = new mysqli($host, $user, $pass, $db);
        if ( $mysqli->connect_errno ) {
            echo $mysqli->connect_error;
            exit();
        }
 
        $mysqli->set_charset('utf8');

        $sql = "INSERT INTO game (day_id, date_of_year, home_team_id, away_team_id, venue_id) 
                VALUES(" . $_POST['day'] . ","
                . "'" . $_POST['date'] . "',"
                . $_POST['home_team'] . ","
                . $_POST['away_team'] . ","
                . $_POST['venue'] . ");";
 
        // echo "<hr>" . $sql ."<hr>";
 
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
	<title>Add Confirmation | Footaball Schedule</title>
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
			<h1 class="col-12 mt-4">Add a Football Game</h1>
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
						Game was successfully added.
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