<?php 
session_start();
//error_reporting(0);

require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';

// if user is logged in  store the session variables in $user_info
if (logged_in() === true) {
    
    // grabs the user_id from the current user session
    $session_user_id = $_SESSION['user_id'];
    // if new data ever added to database just add to end of user_info and will have access to it 
    $user_info = user_info($session_user_id, 'user_id', 'first_name' , 'last_name', 'email' , 'password');
    
}

$error_message = array();
?>