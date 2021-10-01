<?php
   require_once('csv_util.php');
   $quote = returnCSVElement('quotes.txt', $_GET['index'], 0);
   $author = returnCSVElement('authors.txt', $_GET['index'], 0)." ".returnCSVElement('authors.txt', $_GET['index'], 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Delete</title>
</head>
<body>
    <div class="column">
        <div class="container mt-5">
            <div class="text-center">
                <h2>
                    <?= $quote?>
                </h2>
            </div>
        </div>
        <div class="container mt-5">
            <div class="text-center">
                <h3>
                    <?= $author?>    
                </h3>
            </div>
        </div>
        <div class="container mt-5">
            <div class="alert alert-danger">  
                <div class="text-center">
                    <h4>
                        Are you sure you want to delete?
                    </h4>
                </div>
            </div>
        </div>
        <div class="container" style="margin: auto;">
            <button type="button" class="btn btn-primary mx-3">Delete</button>
            <button type="button" href="index.php" class="btn btn-primary mx-3">Go Back</button>
        </div>
    </div>
    
    
     
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>
</html>