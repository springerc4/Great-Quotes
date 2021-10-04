<?php
    require_once('csv_util.php');
    $author_array = convertCSV('authors.txt');
    $quote_array = convertCSV('quotes.txt');
    $index = $_GET['index'];
    echo '<h1>Quotes by '.$author_array[$index][0].' '.$author_array[$index][1].'</h1><br>';
    for ($i = 0; $i < count($quote_array); $i++) {
        if ($quote_array[$i][1] == $index) {
            if ($quote_array[$i][1] == null) {
                break;
            }
            else {
                echo $quote_array[$i][0].'<br>';
            }
        }
    }
    echo '<a href="authors-index.php">Back to Authors</a>';
?>