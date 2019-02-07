<?php

	$host = "303.itpwebdev.com";
	$user = "durhamca_db_user";
	$pass = "Pokenut1!";
	$db = "durhamca_dvd_db";

	$mysqli =  new mysqli($host, $user, $pass, $db);

	if($mysqli->connect_errno) {
		echo $mysqli->connect_errno;
		exit();
	}

	$mysqli->set_charset('utf-8');

    $sql_labels = "SELECT * FROM labels";
    $results_labels = $mysqli->query($sql_labels);
    if( !$results_labels) {
        echo $mysqli->error;
        exit();
    }

    $sql_sounds = "SELECT * FROM sounds";
    $results_sounds = $mysqli->query($sql_sounds);
    if( !$results_sounds) {
        echo $mysqli->error;
        exit();
    }

    $sql_genres = "SELECT * FROM genres";
    $results_genres = $mysqli->query($sql_genres);
    if( !$results_genres) {
        echo $mysqli->error;
        exit();
    }

    $sql_ratings = "SELECT * FROM ratings";
    $results_ratings = $mysqli->query($sql_ratings);
    if( !$results_ratings) {
        echo $mysqli->error;
        exit();
    }

    $sql_formats = "SELECT * FROM formats";
    $results_formats = $mysqli->query($sql_formats);
    if( !$results_formats) {
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
	<title>Add Form | DVD</title>
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
			<h1 class="col-12 mt-4 mb-4">Add a DVD</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">

		<form action="add_confirmation.php" method="POST">

			<div class="form-group row">
				<label for="title_id" class="col-sm-3 col-form-label text-sm-right">
					Title: <span class="text-danger">*</span>
				</label>
				<div class="col-sm-9">
					<input type="text" name="title" id="title_id" class="form-control">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="release_date_id" class="col-sm-3 col-form-label text-sm-right">
					Release Date:
				</label>
				<div class="col-sm-9">
					<input type="date" class="form-control" id="release_date_id" name="release_date">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="label_id" class="col-sm-3 col-form-label text-sm-right">
					Label:
				</label>
				<div class="col-sm-9">
					<select name="label" id="label_id" class="form-control">
						<option value="" selected>-- Select One --</option>

						<!-- TODO: Display teams  -->
						<?php while($row = $results_labels->fetch_assoc()):?>
							<option value="<?php echo $row['label_id'];?>">
						    <?php echo $row['label']; ?>
						    </option>
						<?php endwhile; ?>

					</select>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="sound_id" class="col-sm-3 col-form-label text-sm-right">
					Sound:
				</label>
				<div class="col-sm-9">
					<select name="sound" id="sound_id" class="form-control">
						<option value="" selected>-- Select One --</option>

						<!-- TODO: Display venues -->
						<?php while($row = $results_sounds->fetch_assoc()):?>
							<option value="<?php echo $row['sound_id'];?>">
						    <?php echo $row['sound']; ?>
						    </option>
						<?php endwhile; ?>

					</select>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="genre_id" class="col-sm-3 col-form-label text-sm-right">
					Genre:
				</label>
				<div class="col-sm-9">
					<select name="genre" id="genre_id" class="form-control">
						<option value="" selected>-- Select One --</option>

						<!-- TODO: Display days -->
						<?php while($row = $results_genres->fetch_assoc()):?>
							<option value="<?php echo $row['genre_id'];?>">
						    <?php echo $row['genre']; ?>
						    </option>
						<?php endwhile; ?>

					</select>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="rating_id" class="col-sm-3 col-form-label text-sm-right">
					Rating:
				</label>
				<div class="col-sm-9">
					<select name="rating" id="rating_id" class="form-control">
						<option value="" selected>-- Select One --</option>

						<!-- TODO: Display days -->
						<?php while($row = $results_ratings->fetch_assoc()):?>
							<option value="<?php echo $row['rating_id'];?>">
						    <?php echo $row['rating']; ?>
						    </option>
						<?php endwhile; ?>

					</select>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="format_id" class="col-sm-3 col-form-label text-sm-right">
					Format:
				</label>
				<div class="col-sm-9">
					<select name="format" id="format_id" class="form-control">
						<option value="" selected>-- Select One --</option>

						<!-- TODO: Display days -->
						<?php while($row = $results_formats->fetch_assoc()):?>
							<option value="<?php echo $row['format_id'];?>">
						    <?php echo $row['format']; ?>
						    </option>
						<?php endwhile; ?>

					</select>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="award_id" class="col-sm-3 col-form-label text-sm-right">
					Award:
				</label>
				<div class="col-sm-9">
					<textarea name="award" id="award_id" class="form-control"></textarea>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<div class="ml-auto col-sm-9">
					<span class="text-danger font-italic">* Required</span>
				</div>
			</div>

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