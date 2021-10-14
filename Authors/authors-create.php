<?php
    require_once('..\csv_util.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Add an Author</title>
  </head>

  <body>
    <h1 style="text-align: center;">Add an Author</h1>
    <form method="POST" action="authors-create.php" id='createauthor' name='createauthor'>
        <div class="container" style="background: lightcyan; padding: 5%; margin: 5%; border-radius: 10%;">
            <div class="row" style="margin-top: 10%; padding-bottom: 10%;">
                <div class="col" style="margin-left: 20%; padding-left: 10%;">
                    <h4>First Name: </h4>
                    <textarea name="fn"></textarea>
                </div>
                <div class="col" style="margin-left: 20%; padding-left: 10%;">
                    <h4>Last Name: </h4>
                    <textarea name="ln"></textarea>
                </div>
            </div>
            <div class="row">
                <input form="createauthor" type="submit" value="Submit" style="background: lightcyan; width: 10%; margin-left: 45%;">
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
        if (!preg_match('/[a-zA-Z]{1,}/', $_POST['fn']) && !preg_match('/[a-zA-Z]{1,}/', $_POST['ln'])) {
            die('<h2 style="text-align: center; color: red; margin-top: -5%;">Invalid: Please enter a valid name</h2>');
        }
        else if (contains('authors.txt', $_POST['fn'],0) && contains('authors.txt', $_POST['ln'],1)) {
            die('<h2 style="text-align:center; color: red; margin-top: -5%;">Invalid: Author already exists</h2>');
        }
        else {
            $newRecord = array($_POST['fn'],$_POST['ln']);
            addNewRecord('authors.txt', $newRecord);
            echo '<h1 style="text-align: center; margin-top: -5%; color: green;">A New author has been Added!</h1>';
            }
    }
?>