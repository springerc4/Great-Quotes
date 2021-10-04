<?php
   require_once('csv_util.php');
   $quote = returnCSVElement('quotes.txt', $_GET['index'], 0);
   $authorIndex = returnCSVElement('quotes.txt', $_GET['index'], 1);
   $author = returnCSVElement('authors.txt', $authorIndex, 0)." ".returnCSVElement('authors.txt', $authorIndex, 1);
   if (isset($_POST['delete'])) {
    deleteRecord();
    echo 'Quote has been deleted!';
   }
   else {
    echo 'Failed';
   }
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
        <div class="row" style="margin: auto;">
            <div class="col sm">   
                <form action="delete.php" method="POST" name="delete">
                    <input class = "btn btn-primary" form="delete" name="deleteSubmit" type="submit" value="Submit">
                </form>
            </div> 
            <div class="col sm">
                <a class="btn btn-primary" href="index.php" role="button">Back to Index</a>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>
</html>
<?php
    
?>