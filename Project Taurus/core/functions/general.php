<?php
    // array_clean_up prevents code injections on arrays.
    function array_clean_up(&$item) {
        $item = mysql_real_escape_string($item);
        
    }
    // clean_up funciton to prevent code injections.
    function clean_up($data) {
        return mysql_real_escape_string($data);
    }

    // print_errors function to print errors to the screen
    function print_errors($error_messages) {
        $output = array(); 
        foreach($error_messages as $error_message) {
            echo $error_message;
        }
    }
?>