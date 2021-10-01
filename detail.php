<?php
    require_once('csv_util.php');
    $enlarged_quote = returnCSVElement('quotes.txt', $_GET['index'], 0);
    $author_list = convertCSV('authors.txt');
    $author_index = returnCSVElement('quotes.txt', $_GET['index'], 1);
    $quote_author = $author_list[$author_index][0].' '.$author_list[$author_index][1];
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Enlarged Quote</title>
  </head>

  <body>
    <div class="card">
        <div class="card-header">
            Selected Quote
        </div>
        <div class="card-body">
            <h5 class="card-title">
                <?= $quote_author ?>
            </h5>
            <p class="card-text">
                <?= '"'.$enlarged_quote.'"' ?>
            </p>
            <a href="delete.php?index=<?=$_GET['index']?>" class="btn btn-primary">Delete Quote</a>
            <a href="modify.php" class="btn btn-primary">Modify Quote</a>
            <a href="index.php" class="btn btn-primary">Return to Quotes</a>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    
  </body>
</html>