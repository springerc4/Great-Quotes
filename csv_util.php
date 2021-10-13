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
    //Converts PHP array to CSV file
    function convertPHP($array, $csv_file) {
        $handle = fopen($csv_file, 'w');
        for ($i = 0; $i < count($array); $i++) {
            $line = $array[$i];
            if ($line == null) {
                break;
            }
            fputcsv($handle, $line, ';');
        }
        fclose($handle);
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
        fwrite($handle, implode(";", $new_record[0]));
        fclose($handle);
    }
    //Modify a line from the CSV file
    function modifyRecord($file, $line, $index, $new_quote,) {
        $array = convertCSV($file);
        $array[$line][$index] = $new_quote;
        $handle = fopen($file, 'w');
        foreach ($array as $records) {
            fputcsv($handle, $records, ';');
        }
        $size = fstat($handle)['size'];
        ftruncate($handle, ($size-1));
        fclose($handle);
    }
    //Deletes the content of a line in a CSV files but keeps the line
    function emptyRecord($file, $line) {
        $arr = convertCSV($file);
        $arr[$line][0] = "";
        $arr[$line][1] = "";
        print_r($arr[$line]);
        $handle = fopen($file, 'w');
        foreach ($arr as $i){
            fputcsv($handle, $i, ';');
        }
        $size = fstat($handle)['size'];
        ftruncate($handle, ($size-1));
        fclose($handle);
    }
    // Deletes a line from the CSV file
    function deleteRecord($file, $line) {
        $arr = convertCSV($file);
        array_splice($arr, $line, 1);
        $handle = fopen($file, 'w');
        foreach ($arr as $i){
            fputcsv($handle, $i, ';');
        }
        $size = fstat($handle)['size'];
        ftruncate($handle, ($size-1));
        fclose($handle);
    }
    // Check if user email is active
    function contains($csv_file, $user_input) {
        $contains = false;
        $handle = fopen($csv_file, "r");
        while (!feof($handle)) {
            $record = fgetcsv($handle, 1024, ';');
            if ($record == '') {
                continue;
            }
            if ($record[0] == $user_input) {
                $contains = true;
                break;
            }
        }
        fclose($handle);
        return $contains;
    }
    // Sees if password is in the database
    function passwordMatch($csv_file, $password) {
        $array = convertCSV($csv_file);
        for ($i = 0; $i < count($array); $i++) {
            if (password_verify($password, $array[$i][1])) {
                return true;
            }
        }
        return false;
    }
?>