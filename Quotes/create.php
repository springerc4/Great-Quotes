<?php
    session_start();
    require_once('..\csv_util.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Create a Quote</title>
  </head>
<?php
    if ($_SESSION['logged'] == "false") {
?>
    <body>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">I'm Sorry</h4>
            <p>In order to create a quote, you have to be signed into an account.</p>
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
    <h1 style="text-align: center;">Create a Quote</h1>
    <form method="POST" action="create.php" id='createauthor' name='createauthor'>
        <div class="container" style="background: lightcyan; padding: 5%; margin: 5%; border-radius: 10%;">
            <div class="row" style="margin-top: 10%; padding-bottom: 10%;">
                <div class="col" style="margin-left: 20%; padding-left: 10%;">
                    <h4>Enter a quote: </h4>
                    <textarea name="userquote"></textarea>
                </div>
                <div class="col" style="margin-right: 20%;">
                    <h4>Who said this?</h4>
                    <select name="authorname" id="author" form="createauthor" style="height: 60%;">
                        <option value="default">Choose an author</option>
                        <?php
                            $author_array = convertCSV('..\Authors\authors.txt');
                            for ($i = 0; $i < count($author_array); $i++) {
                                $author_name = $author_array[$i][0].' '.$author_array[$i][1];
                                echo $author_name;
                        ?>
                        <option name="<?= $author_name ?>" value="<?= $author_name ?>"><?= $author_name ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <input form="createauthor" type="submit" value="Submit" style="background: lightcyan; width: 10%; margin-left: 45%;">
                <a class="btn btn-secondary" href="index.php" role="button" style="width: 15%; margin-left: 42.5%; margin-top: 5%;">Back to Index</a>
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
        if (!preg_match('/[a-zA-Z]{1,}/', $_POST['userquote'])) {
            die('<h2 style="text-align: center; color: red; margin-top: -5%;">Invalid: Please enter a quote</h2>');
        }
        else if ($_POST['authorname'] == 'default') {
            die('<h2 style="text-align:center; color: red; margin-top: -5%;">Invalid: Please choose an author</h2>');
        }
        else {
            for ($i = 0; $i < count($author_array); $i++) {
                if (implode(" ", $author_array[$i]) == $_POST['authorname']) {
                    $new_record[] = array($_POST['userquote'], strval($i));
                    addNewRecord('quotes.txt', $new_record[0]);
                    echo '<h1 style="text-align: center; margin-top: -5%; color: green;">A New Quote has been Added!</h1>';
                }
            }print_r($new_record);
        }
    }
?>