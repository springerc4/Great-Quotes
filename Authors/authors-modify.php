<?php
   session_start();
   require_once('..\csv_util.php');
   $index = $_SESSION['index'];
   $quote = returnCSVElement('quotes.txt', $index, 0);
   $authorIndex = returnCSVElement('quotes.txt', $index, 1);
   $author = returnCSVElement('..\Authors\authors.txt', $authorIndex, 0)." ".returnCSVElement('..\Authors\authors.txt', $authorIndex, 1);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Modify</title>
</head>
<?php
    if ($_SESSION['logged'] == "false") {
?>
    <body>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">I'm Sorry</h4>
            <p>In order to modify a quote, you have to be signed in to an account.</p>
            <hr>
            <p class="mb-0">
                <a href="..\signup.php"><button type="button" class="btn btn-primary">Sign Up</button></a>
                <a href="..\signin.php"><button type="button" class="btn btn-primary">Sign In</button></a>
                <a href="index.php"><button type="button" class="btn btn-primary">Home</button></a>
            </p>
        </div>
    </body>
<?php
    }
    else {
?>
<body>
    <h1 style="text-align: center; margin-top:10%;">Modify</h1>
        <div class="container mx-auto mt-5">
            <form method="POST" action="modify.php" id="modify" name="modifyQuote">
                <div class="container m p-2 rounded" style="background: orange;">
                    <div class="row">
                        <div class="col" style="margin: auto;">
                            <h4>Quote</h4>
                            <textarea name="quote" id="quote" cols="30" rows="3"></textarea>
                        </div>
                        <div class="col" style="margin: auto;">
                            <h4 style="text-align: center;">Author</h4>
                            <h5 style="background: white; margin:auto; text-align:center"><?=$author?></h5>    
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col sm">
                            <input class="btn btn-primary" form="modify" type="submit" value="Submit">
                        </div>
                        <div class="col sm">
                            <a href="index.php" class="btn btn-primary">Go Back</a>
                        </div>
                    </div>
                </div>
            </form>    
        </div>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
  </body>
</html>

<?php
        if (!empty($_POST)) {
            if (!preg_match('/[a-zA-Z]{1,}/', $_POST['quote'])) {
                die('<h2 style="text-align: center; color: red; margin-top: -5%;">Invalid: Please enter a quote</h2>');
            }
            else{
                modifyRecord('quotes.txt', $index, 0, $_POST['quote']);
                echo '<h1 style="text-align: center; margin-top: -5%; color: green;">This quote has been modified!</h1>';
            }
        }
    }

?>