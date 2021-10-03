<?php
    require_once('csv_util.php');
    $author_array = convertCSV('authors.txt');
    $quote_array = convertCSV('quotes.txt');
    $index = $_GET['index'];
?>