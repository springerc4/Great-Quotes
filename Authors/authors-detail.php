<?php
    session_start();
    require_once('..\csv_util.php');
    $author_array = convertCSV('authors.txt');
    $quote_array = convertCSV('..\Quotes\quotes.txt');
    $index = $_GET['index'];
    $_SESSION['index'] = $index;
    if (isset($_POST['submit'])) {
        $target_dir = "..\photos/";
        $target_file = $target_dir.basename($_FILES["photoFile"]["name"]);
        move_uploaded_file($_FILES["photoFile"]["tmp_name"], $target_file);
        $author_array[$index][2] = $target_file;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Details</title>
</head>
<body>
    <?php
    echo '<h1>'.$author_array[$index][0].' '.$author_array[$index][1].'</h1><br>';
    ?>
    <img src="<?= $author_array[$_GET['index']][2] ?>" class="img-thumbnail" alt="Photo Not Available" style="max-width: 20%;">
    <?php
    if ($_SESSION['logged'] == "true") {
    ?>
    <!-- Form for processing photo upload -->
    <form method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3" style="width: 50%;">
            <input name="photoFile" type="file" class="form-control" id="inputGroupFile02">
            <br>
            <button name="submit" type="submit" class="btn btn-primary mb-3">Update Photo</button>
        </div>
    </form>
    <?php
    }
    echo '<hr>';
    echo '<h3>Quotes</h3>';
    for ($i = 0; $i < count($quote_array); $i++) {
        if ($quote_array[$i][1] == $index) {
            if ($quote_array[$i][1] == null) {
                break;
            }
            else {
                echo $quote_array[$i][0].'<br><br>';
            }
        }
    }
    convertPHP($author_array, 'authors.txt');
    ?>

    <a class="btn btn-primary" href="authors-index.php">Back to Authors</a>
    <a class="btn btn-primary" href="authors-delete.php">Delete Author</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
</body>
</html>
