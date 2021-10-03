<?php
    //Converts the CSV file to a PHP array
    function convertCSV($csv_file) {
        $handle = fopen($csv_file, 'r');
        while(!feof($handle)) {
            $records[] = fgetcsv($handle, 1024, ';');
        }
        fclose($handle);
        return $records;
    }
    //Returns a specified element from the CSV file in the form of a PHP array element
    function returnCSVElement($csv_file, $element, $index) {
        $new_array = convertCSV($csv_file);
        return $new_array[$element][$index];
    }
    //Append a new record to the CSV file
    function addNewRecord($csv_file, $new_record) {
        $handle = fopen($csv_file, 'a');
        fwrite($handle, ''.PHP_EOL);
        for ($i = 0; $i < count($new_record); $i++) {
            fwrite($handle, implode(";", $new_record[$i]));
        }
        fclose($handle);
    }
    //Modify a line from the CSV file
    function modifyRecord($file, $line, $index, $record) {
        $arr = convertCSV($file);
        $arr[$line][$index] = $record;
        $handle = fopen($file, 'w');
        ftruncate($handle, 0);
        foreach ($arr as $line){
            fputcsv($handle, $line, ';');
        }
        fclose($handle);
    }
    //Deletes the content of a line in a CSV files but keeps the line
    function emptyRecord() {
        $arr = convertCSV($file);
        $arr[$line][0] = "";
        $arr[$line][0] = "";
        print_r($arr[$line]);
        $handle = fopen($file, 'w');
        ftruncate($handle, 0);
        foreach ($arr as $line){
            fputcsv($handle, $line, ';');
        }
        fclose($handle);
    }
    // Deletes a line from the CSV file
    function deleteRecord() {
        $arr = convertCSV($file);
        array_splice($arr, $line, 1);
        $handle = fopen($file, 'w');
        foreach ($arr as $line){
            fputcsv($handle, $line, ';');
        }
        fclose($handle);
    }
?>