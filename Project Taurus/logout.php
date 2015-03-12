<?php 
    session_start();
    session_destroy();
    
    // Redirects user back home
    header('Location: index.php');
?>