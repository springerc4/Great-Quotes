<?php
    require_once('..\csv_util.php');
    $authors_array = convertCSV('authors.txt');
    echo '<h1>List of Authors</h1>'.'<br>';
    // Loop through authors in author array
    for ($i = 0; $i < count($authors_array); $i++) {
        if ($authors_array[$i] == null) {
          break;
        }
        echo $authors_array[$i][0].' '.$authors_array[$i][1].'<br>';
        echo '<a href="authors-detail.php?index='.$i.'">See Quotes</a>'.'<br>';
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>List of Authors</title>
  </head>
  <body>
    <hr>
    <a class="btn btn-primary" href="authors-create.php" role="button">Create an Author</a>
    <a class="btn btn-primary" href="..\Quotes\index.php" role="button">Back to Index</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    
  </body>
</html>