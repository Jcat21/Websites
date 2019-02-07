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

    $sql_labels = "SELECT * FROM labels";
    $results_labels = $mysqli->query($sql_labels);
    if( !$results_labels) {
        echo $mysqli->error;
        exit();
    }

    $sql_formats = "SELECT * FROM formats";
    $results_formats = $mysqli->query($sql_formats);
    if( !$results_formats) {
        echo $mysqli->error;
        exit();
    }

    $sql_sounds = "SELECT * FROM sounds";
    $results_sounds = $mysqli->query($sql_sounds);
    if( !$results_sounds) {
        echo $mysqli->error;
        exit();
    }

    $sql_dvd = "SELECT * FROM dvd_titles WHERE dvd_title_id =" . $_GET['dvd_title_id'] . ";";
    $results_dvd = $mysqli->query($sql_dvd);
    if(!$results_dvd){
        echo $mysqli->error;
        exit();
    }
    $row_dvd = $results_dvd->fetch_assoc();

    $mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Form | DVD Database</title>
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
        <li class="breadcrumb-item"><a href="search_form.php">Search</a></li>
        <li class="breadcrumb-item"><a href="search_results.php">Results</a></li>
        <li class="breadcrumb-item"><a href="details.php?dvd_title_id=<?php echo $_GET['dvd_title_id']; ?>">Details</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
    <div class="container">
        <div class="row">
            <h1 class="col-12 mt-4 mb-4">Edit a Track</h1>
        </div> <!-- .row -->
    </div> <!-- .container -->
    <div class="container">
        <form action="edit_confirmation.php" method="POST">
            <div class="form-group row">
                <label for="title-id" class="col-sm-3 col-form-label text-sm-right">DVD Title:<span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="title-id" name="title" value="<?php echo $row_dvd['title']?>">
                </div>
            </div> <!-- .form-group -->
            <div class="form-group row">
                <label for="release_date_id" class="col-sm-3 col-form-label text-sm-right">
                    Release Date:
                </label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="release_date_id" name="release_date" value="<?php echo $row_dvd['release_date']?>">
                </div>
            </div> <!-- .form-group -->
            <div class="form-group row">
                <label for="genre-id" class="col-sm-3 col-form-label text-sm-right">Genre:</label>
                <div class="col-sm-9">
                    <select name="genre" id="genre-id" class="form-control">
                        <option value="" selected>-- All --</option>

                        <!-- Genre dropdown options here -->
                        <?php while( $row = $results_genres->fetch_assoc() ): ?>
                            <?php if($row_dvd['genre_id'] == $row['genre_id']): ?>
                                <option selected value="<?php echo $row['genre_id']; ?>">
                                    <?php echo $row['genre']; ?>
                                </option>
                            <?php else: ?>
                                <option value="<?php echo $row['genre_id']; ?>">
                                    <?php echo $row['genre']; ?>
                                </option>
                            <?php endif; ?>
                        <?php endwhile; ?>

                    </select>
                </div>
            </div> <!-- .form-group -->
            <div class="form-group row">
                <label for="rating-id" class="col-sm-3 col-form-label text-sm-right">Rating:</label>
                <div class="col-sm-9">
                    <select name="rating" id="rating-id" class="form-control">
                        <option value="" selected>-- All --</option>

                        <!-- Rating dropdown options here -->
                        <?php while($row = $results_ratings->fetch_assoc()):?>
                            <?php if($row_dvd['rating_id'] == $row['rating_id']) : ?>
                                <option selected value="<?php echo $row['rating_id'];?>">
                                    <?php echo $row['rating']; ?>
                                </option>
                            <?php else: ?>
                                <option value="<?php echo $row['rating_id'];?>">
                                    <?php echo $row['rating']; ?>
                                </option>
                            <?php endif; ?>
                        <?php endwhile; ?>
                        
                    </select>
                </div>
            </div> <!-- .form-group -->
            <div class="form-group row">
                <label for="label-id" class="col-sm-3 col-form-label text-sm-right">Label:</label>
                <div class="col-sm-9">
                    <select name="label" id="label-id" class="form-control">
                        <option value="" selected>-- All --</option>

                        <!-- Label dropdown options here -->
                        <?php while($row = $results_labels->fetch_assoc()):?>
                            <?php if($row_dvd['label_id'] == $row['label_id']) : ?>
                                <option selected value="<?php echo $row['label_id'];?>">
                                    <?php echo $row['label']; ?>
                                </option>
                            <?php else: ?>
                                <option value="<?php echo $row['label_id'];?>">
                                    <?php echo $row['label']; ?>
                                </option>
                            <?php endif; ?>
                        <?php endwhile; ?>
                        
                    </select>
                </div>
            </div> <!-- .form-group -->
            <div class="form-group row">
                <label for="format-id" class="col-sm-3 col-form-label text-sm-right">Format:</label>
                <div class="col-sm-9">
                    <select name="format" id="format-id" class="form-control">
                        <option value="" selected>-- All --</option>

                        <!-- Format dropdown options here -->
                        <?php while($row = $results_formats->fetch_assoc()):?>
                            <?php if($row_dvd['format_id'] == $row['format_id']) : ?>
                                <option selected value="<?php echo $row['format_id'];?>">
                                    <?php echo $row['format']; ?>
                                </option>
                            <?php else: ?>
                                <option value="<?php echo $row['format_id'];?>">
                                    <?php echo $row['format']; ?>
                                </option>
                            <?php endif; ?>
                        <?php endwhile; ?>
                        
                    </select>
                </div>
            </div> <!-- .form-group -->
            <div class="form-group row">
                <label for="sound-id" class="col-sm-3 col-form-label text-sm-right">Sound:</label>
                <div class="col-sm-9">
                    <select name="sound" id="sound-id" class="form-control">
                        <option value="" selected>-- All --</option>

                        <!-- Sound dropdown options here -->
                        <?php while($row = $results_sounds->fetch_assoc()):?>
                            <?php if($row_dvd['sound_id'] == $row['sound_id']) : ?>
                                <option selected value="<?php echo $row['sound_id'];?>">
                                    <?php echo $row['sound']; ?>
                                </option>
                            <?php else: ?>
                                <option value="<?php echo $row['sound_id'];?>">
                                    <?php echo $row['sound']; ?>
                                </option>
                            <?php endif; ?>
                        <?php endwhile; ?>
                        
                    </select>
                </div>
            </div> <!-- .form-group -->
            <div class="form-group row">
                <label for="award_id" class="col-sm-3 col-form-label text-sm-right">
                    Award:
                </label>
                <div class="col-sm-9">
                    <textarea name="award" id="award_id" class="form-control"><?php echo $row_dvd['award']?></textarea>
                </div>
            </div> <!-- .form-group -->
            <input type="hidden" name="dvd_title_id" value="<?php echo $_GET['dvd_title_id']; ?>">
            <div class="form-group row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 mt-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-light">Reset</button>
                </div>
            </div> <!-- .form-group -->
        </form>
    </div> <!-- .container -->
</body>
</html>