<?php
    require_once('csv_util.php');
    $authors_array = convertCSV('authors.txt');
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

  <body>
    <h1 style="text-align: center;">Quotes and Authors</h1>
    <?php
        for ($i = 0; $i < count($quotes_array); $i++) {
    ?>

    <div class="col-12 col-sm-6 col-lg-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= implode(" ", $authors_array[intval($quotes_array[$i][1])]) ?></h5>
                <p class="card-text"><?= '"'.$quotes_array[$i][0].'"' ?></p>
                <a href="detail.php?index=<?= $i ?>" class="card-link" style="text-decoration: none; color: blue;">Details</a>
            </div>
        </div>
    </div>

    <?php
        }
    ?>
    <a class="btn btn-primary" href="create.php" role="button" style="margin: 5%;">Create a Quote</a>
    <a class="btn btn-primary" href="authors-index.php" role="button">Authors</a>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
  </body>
</html>