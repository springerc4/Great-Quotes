<?php
   session_start();
   require_once('..\csv_util.php');
   $index = $_SESSION['index'];
   $author = returnCSVElement('..\Authors\authors.txt', $index, 0)." ".returnCSVElement('..\Authors\authors.txt', $index, 1);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Modify Author</title>
</head>
<?php
    if ($_SESSION['logged'] == "false") {
?>
    <body>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">I'm Sorry</h4>
            <p>In order to modify an author, you have to be signed into an account.</p>
            <hr>
            <p class="mb-0">
                <a href="..\Authentication\signup.php"><button type="button" class="btn btn-primary">Sign Up</button></a>
                <a href="..\Authentication\signin.php"><button type="button" class="btn btn-primary">Sign In</button></a>
                <a href="authors-index.php"><button type="button" class="btn btn-primary">Home</button></a>
            </p>
        </div>
    </body>
<?php
    }
    else {
?>
<body>
    <h1 style="text-align: center;">Modify Author</h1>
    <h4 style="text-align:center;">
        <?= $author ?>
    </h4>
    <form method="POST" action="authors-modify.php" id='modifyauthor' name='modifyauthor'>
        <div class="container" style="background: lightcyan; padding: 5%; margin: 5%; border-radius: 10%;">
            <div class="row" style="margin-top: 10%; padding-bottom: 10%;">
                <div class="col" style="margin-left: 20%; padding-left: 10%;">
                    <h4>First Name: </h4>
                    <textarea name="fn"></textarea>
                </div>
                <div class="col" style="margin-left: -5%; padding-left: 10%;">
                    <h4>Last Name: </h4>
                    <textarea name="ln"></textarea>
                </div>
            </div>
            <div class="row">
                <input form="modifyauthor" type="submit" value="Submit" style="background: lightcyan; width: 10%; margin-left: 45%;">
                <a class="btn btn-secondary" href="authors-index.php" role="button" style="width: 15%; margin-left: 42.5%; margin-top: 5%;">Back to authors</a>
            </div>
        </div>
    </form> 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
  </body>
</html>

<?php
        if (!empty($_POST)) {
            if (!preg_match('/[a-zA-Z]{1,}/', $_POST['fn']) || !preg_match('/[a-zA-Z]{1,}/', $_POST['ln'])) {
                die('<h2 style="text-align: center; color: red; margin-top: -5%;">Invalid: Please enter an Author</h2>');
            }
            else{
                modifyRecord('authors.txt', $index, 0, $_POST['fn']);
                modifyRecord('authors.txt', $index, 1, $_POST['ln']);
                echo '<h1 style="text-align: center; margin-top: -5%; color: green;">This author has been modified!</h1>';
            }
        }
    }

?>