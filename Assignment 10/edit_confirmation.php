<?php
    if(!isset($_POST['title']) || empty($_POST['title']) ) {
        $error = "Please fil out all required fields.";
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
 
        if(!isset($_POST['genre']) || empty($_POST['genre'])) {
            $genre = "null";
        }
        else {
            $genre = $_POST['genre'];
        }
        if(!isset($_POST['rating']) || empty($_POST['rating'])) {
            $rating = "null";
        }
        else {
            $rating = $_POST['rating'];
        }
        if(!isset($_POST['label']) || empty($_POST['label'])) {
            $label = "null";
        }
        else {
            $label = $_POST['label'];
        }
        if(!isset($_POST['format']) || empty($_POST['format'])) {
            $format = "null";
        }
        else {
            $format = $_POST['format'];
        }
        if(!isset($_POST['sound']) || empty($_POST['sound'])) {
            $sound = "null";
        }
        else {
            $sound = $_POST['sound'];
        }
        if(!isset($_POST['award']) || empty($_POST['award'])) {
            $award = "null";
        }
        else {
            $award = "'" . $_POST['award'] . "'";
        }
        if(!isset($_POST['release_date']) || empty($_POST['release_date'])) {
            $release = "null";
        }
        else {
            $release = "'" . $_POST['release_date'] . "'";
        }

        $sql = "UPDATE dvd_titles 
            SET title = '" . $_POST['title'] . 
            "', genre_id = " . $genre. 
            ", rating_id = " . $rating . 
            ", label_id = " . $label .
            ", format_id = " . $format .
            ", sound_id = " . $sound .
            ", award = " . $award .
            ", release_date = " . $release .
            " WHERE dvd_title_id = " . $_POST['dvd_title_id'] .";";
 
        // send off the query
        $results = $mysqli->query($sql);
        if(!$results) {
            echo $mysqli->error;
            exit();
        }
        // and that's it!
 
        $mysqli->close();
 
    }
 
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Confirmation | Song Database</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="search_form.php">Search</a></li>
        <li class="breadcrumb-item"><a href="search_results.php">Results</a></li>
        <li class="breadcrumb-item"><a href="details.php?dvd_title_id=<?php echo $_POST['dvd_title_id']; ?>">Details</a></li>
        <li class="breadcrumb-item"><a href="edit_form.php?dvd_title_id=<?php echo $_POST['dvd_title_id']; ?>">Edit</a></li>
        <li class="breadcrumb-item active">Confirmation</li>
    </ol>
    <div class="container">
        <div class="row">
            <h1 class="col-12 mt-4">Edit Confirmation</h1>
        </div> <!-- .row -->
    </div> <!-- .container -->
    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
 
    <?php if( isset($error) && !empty($error) ): ?>
        <div class="text-danger">
            <?php echo $error; ?>
        </div>
    <?php else: ?>
        <div class="text-success">
            <span class="font-italic"><?php echo $_POST['title'] ?></span> was successfully edited.
        </div>
    <?php endif;?>
 
            </div> <!-- .col -->
        </div> <!-- .row -->
        <div class="row mt-4 mb-4">
            <div class="col-12">
                <a href="details.php?dvd_title_id=<?php echo $_POST['dvd_title_id']; ?>" role="button" class="btn btn-primary">Back to Details</a>
            </div> <!-- .col -->
        </div> <!-- .row -->
    </div> <!-- .container -->
</body>
</html>