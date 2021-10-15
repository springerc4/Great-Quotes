<?php
    session_start();
    require_once('..\csv_util.php');
    require_once('..\Authentication\auth.php');
    // Check if user is logged in
    if (!isset($_SESSION['logged'])) {
      $_SESSION['logged'] = "false";
    }
    // Create arrays for two csv files
    $authors_array = convertCSV('..\Authors\authors.txt');
    $quotes_array = convertCSV('quotes.txt');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Index Page</title>
  </head>
  <!-- Display all quotes and authors -->
  <body>
    <h1 style="text-align: center;">Quotes and Authors</h1>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Explore</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="..\Authentication\signin.php">Sign In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="..\Authentication\signup.php">Sign Up</a>
            </li>
            <?php
              // Check if user is logged in
              if ($_SESSION['logged'] == 'true') {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="..\Authentication\signout.php">Sign Out</a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
    <?php
        // Don't display blank lines in csv file
        for ($i = 0; $i < count($quotes_array); $i++) {
          if ($quotes_array[$i] == null) {
            break;
          }
          $author_name = [$authors_array[intval($quotes_array[$i][1])][0], $authors_array[intval($quotes_array[$i][1])][1]];
    ?>
    <!-- Display each card by looping through quotes and authors -->
    <div class="col-12 col-sm-6 col-lg-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= implode(" ", $author_name) ?></h5>
                <p class="card-text"><?= '"'.$quotes_array[$i][0].'"' ?></p>
                <a href="detail.php?index=<?= $i ?>" class="card-link" style="text-decoration: none; color: blue;">Details</a>
            </div>
        </div>
    </div>

    <?php
        }
    ?>
    <a class="btn btn-primary" href="create.php" role="button" style="margin: 5%;">Create a Quote</a>
    <a class="btn btn-primary" href="..\Authors\authors-index.php" role="button">Authors</a>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
  </body>
</html>