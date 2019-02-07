<?php

	$host = "303.itpwebdev.com";
	$user = "durhamca_db_user";
	$pass = "Pokenut1!";
	$db = "durhamca_a7_football_db";

	$mysqli =  new mysqli($host, $user, $pass, $db);

	if($mysqli->connect_errno) {
		echo $mysqli->connect_errno;
		exit();
	}

	$mysqli->set_charset('utf-8');

    $sql_teams = "SELECT * FROM team";
    $results_hometeams = $mysqli->query($sql_teams);
    if( !$results_hometeams) {
        echo $mysqli->error;
        exit();
    }
    $results_awayteams = $mysqli->query($sql_teams);
    if( !$results_awayteams) {
        echo $mysqli->error;
        exit();
    }

    $sql_venues = "SELECT * FROM venue";
    $results_venues = $mysqli->query($sql_venues);
    if( !$results_venues) {
        echo $mysqli->error;
        exit();
    }

    $sql_days = "SELECT * FROM day";
    $results_days = $mysqli->query($sql_days);
    if( !$results_days) {
        echo $mysqli->error;
        exit();
    }

    // $sql_dates = "SELECT date FROM game";
    // $results_dates = $mysqli->query($sql_dates);
    // if( !$results_dates) {
    //     echo $mysqli->error;
    //     exit();
    // }

    $mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Form | Footaball Schedule</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style>
		.form-check-label {
			padding-top: calc(.5rem - 1px * 2);
			padding-bottom: calc(.5rem - 1px * 2);
			margin-bottom: 0;
		}
	</style>
</head>
<body>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.php">Home</a></li>
		<li class="breadcrumb-item active">Add</li>
	</ol>
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4 mb-4">Add a Football Game</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">

		<form action="add_confirmation.php" method="POST">

			<div class="form-group row">
				<label for="home_team" class="col-sm-3 col-form-label text-sm-right">
					Home Team: <span class="text-danger">*</span>
				</label>
				<div class="col-sm-9">
					<select name="home_team" id="home_team" class="form-control">
						<option value="" selected>-- All --</option>

						<!-- TODO: Display teams  -->
						<?php while($row = $results_hometeams->fetch_assoc()):?>
							<option value="<?php echo $row['id'];?>">
						    <?php echo $row['team_name']; ?>
						    </option>
						<?php endwhile; ?>

					</select>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="away_team" class="col-sm-3 col-form-label text-sm-right">
					Away Team: <span class="text-danger">*</span>
				</label>
				<div class="col-sm-9">
					<select name="away_team" id="away_team" class="form-control">
						<option value="" selected>-- All --</option>

						<!-- TODO: Display teams  -->
						<?php while($row = $results_awayteams->fetch_assoc()):?>
							<option value="<?php echo $row['id'];?>">
						    <?php echo $row['team_name']; ?>
						    </option>
						<?php endwhile; ?>

					</select>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="venue" class="col-sm-3 col-form-label text-sm-right">
					Venue: <span class="text-danger">*</span>
				</label>
				<div class="col-sm-9">
					<select name="venue" id="venue" class="form-control">
						<option value="" selected>-- All --</option>

						<!-- TODO: Display venues -->
						<?php while($row = $results_venues->fetch_assoc()):?>
							<option value="<?php echo $row['id'];?>">
						    <?php echo $row['venue_name']; ?>
						    </option>
						<?php endwhile; ?>

					</select>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="day" class="col-sm-3 col-form-label text-sm-right">
					Day: <span class="text-danger">*</span>
				</label>
				<div class="col-sm-9">
					<select name="day" id="day" class="form-control">
						<option value="" selected>-- All --</option>

						<!-- TODO: Display days -->
						<?php while($row = $results_days->fetch_assoc()):?>
							<option value="<?php echo $row['id'];?>">
						    <?php echo $row['day_of_week']; ?>
						    </option>
						<?php endwhile; ?>

					</select>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="date" class="col-sm-3 col-form-label text-sm-right">
					Date: <span class="text-danger">*</span>
				</label>
				<div class="col-sm-9">
					<input type="date" class="form-control" id="date" name="date">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-2">
					<button type="submit" class="btn btn-primary">Add</button>
					<button type="reset" class="btn btn-light">Reset</button>
				</div>
			</div> <!-- .form-group -->
		</form>
	</div> <!-- .container -->
</body>
</html>