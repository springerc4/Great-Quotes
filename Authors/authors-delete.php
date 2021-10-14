<?php
   session_start();
   require_once('..\csv_util.php');
   $index = $_SESSION['index'];
   $author = returnCSVElement('authors.txt', $index, 0)." ".returnCSVElement('authors.txt', $index, 1);
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
    <?php
        if ($_SESSION['logged'] == 'false') {
    ?>
    <body>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">I'm Sorry</h4>
            <p>In order to delete an author, you have to be signed into an account.</p>
            <hr>
            <p class="mb-0">
                <a href="..\signup.php"><button type="button" class="btn btn-primary">Sign Up</button></a>
                <a href="..\signin.php"><button type="button" class="btn btn-primary">Sign In</button></a>
                <a href="authors-index.php"><button type="button" class="btn btn-primary">Home</button></a>
            </p>
        </div>
    </body>
    <?php
        }
        else {
    ?>
    <div class="column">
        <div class="container mt-5">
            <div class="text-center">
                <h2>
                    <?php if (!isset($_POST['delete'])){
                        echo $author;
                    }
                     ?>
                </h2>
            </div>
        </div>
        <div class="container mt-5">
            <div class="alert alert-danger">  
                <div class="text-center">
                    <h4>
                        <?php if (!isset($_POST['delete'])){
                           echo "Are you sure you want to delete this author?";
                        }else{
                            echo "Deleted!";
                        }
                        ?>
                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col" style="margin-left: 30%;">   
                <form action="authors-delete.php" method="POST" name="delete" id="delete">
                    <input type="hidden" value="delete" name="delete" id="delete">
                    <input class="btn btn-primary" form="delete" type="submit" value="delete">
                </form>
            </div> 
            <div class="col">
                <a href="authors-index.php" class="btn btn-primary">Go Back</a>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>
</html>
<?php
    if (isset($_POST['delete'])){
        deleteRecord('authors.txt', $index);
        $quotesArray = convertCSV('..\Quotes\quotes.txt');
        for ($i=0; $i<count($quotesArray); $i++){
            if ($quotesArray[$i][1] == $index){
                print_r($quotesArray[$i]);
                deleteRecord('..\Quotes\quotes.txt', $i);
            }
        }
    }
}
?>