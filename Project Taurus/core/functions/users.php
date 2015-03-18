<?php 

function register_user($register_data) {
    array_walk($register_data, 'array_clean_up' );
    $register_data['password'] = md5($register_data['password']);
    
    $fields = '`' . implode('`,`', array_keys($register_data)) . '`' ;
    $data = '\'' . implode('\',\'', $register_data) . '\'';

    mysql_query("INSERT INTO `profiles` ($fields) VALUES ($data)");
}
// Holds the session variables for the user.
function user_info($user_id) {
    //creates a info array for the current user.
    $info =  array();
    
    //casts the value of $user_id to int so it cannot be any other data type
    $user_id = (int)$user_id;
    
    //func_num_args gets the amount of arguments in the database
    $func_num_args = func_num_args();
    
    //returns an array of the arguments passed through the user_info function 
    $func_get_args = func_get_args();
    
    if($func_num_args > 1) {
        unset($func_get_args[0]);
        
        // array to string
        $fields = '`' . implode('`, `', $func_get_args) . '`';
        $info = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `profiles` WHERE `user_id` = $user_id"));
        
        
        return $info;
    }
    
}

// Function to check if user is logged in or not.
function logged_in() {
    return (isset($_SESSION['user_id'])) ? true : false;
}

// Function to check if user is in database.
function user_exists($email) {
    // Prevents code injections.
    $email = clean_up($email);
    
    // MySQL query to check if the users email is in the database.
    $query = mysql_query("SELECT COUNT(`user_id`) FROM `profiles` WHERE `email` = '$email' ");
    
    // Returns true or false depending of if user is in database.
    return (mysql_result($query, 0) == 1) ? true : false;
}

// Function to check if user has activated their account.
/*
function user_active($email) {
    //Prevents code injections.
    $email = clean_up($email);
    
    // MySQL query to check if the users email is in the database.
    $query = mysql_query("SELECT COUNT(`user_id`) FROM `profiles` WHERE `email` = '$email' AND `active` = 1");
    
        // Returns true or false depending of if user is active in database
    return (mysql_result($query, 0) == 1) ? true : false;
}
*/


// Function to get the user_id from the email.
function user_id_from_email($email) {
    //Prevents code injections
    $email = clean_up($email);
    return mysql_result(mysql_query("SELECT `user_id` FROM `profiles` WHERE `email` = '$email' "), 0, 'user_id');
}

// Function to log user in with a valid email and password.
function login($email, $password) {
    $user_id = user_id_from_email($email);
    
    
    // Prevents code injections on email
    $email = clean_up($email);
    // Encrypts password with md5
    $password = md5($password);
    
    return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `profiles` WHERE `email` = '$email' AND `password` = '$password' "), 0) == 1) ? $user_id : false;
}


?>