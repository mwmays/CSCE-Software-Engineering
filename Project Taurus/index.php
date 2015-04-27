<?php
 // File includes for account system.
 include 'core/init.php';

?>
<!doctype html>
<html>
    <head>
        <title>Home Page</title>
        <meta charset="UTF-8">
        <!-- Regular Stylesheet -->
        <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
        <!-- Core Library Script -->
        <script src="jquery/jquery-1.11.2.min.js"></script>
        <!-- UserInterface Library Script -->
        <script src="jquery/jquery-ui-1.10.4.custom.min.js"></script>
        <!-- Jquery Validation Script -->
        <script src="jquery/jquery.validate.min.js"></script>
        <!-- Additional Methods Script -->
        <script src="jquery/additional-methods.min.js"></script>
        <!-- Plugin Script -->
        <script src="jquery/validation/validate.js"></script>
        
    </head>
    <body>
        <!-- Header with navigation bar -->
        <header>
                <!-- Navigation with user controls after signed in -->
                <nav id="top_nav">
                    <ul>
                        <!--
                        <li><a href="#">Link1</a></li>
                        <li><a href="#">Link2</a></li>
                        <li><a href="#">Link3</a></li>
                        -->
                        <? 
                        // Displays welcome message if user is logged in
                        if ($user_info['first_name']) { ?>
                        <span id="user_controls">
                            <li><h3><a href="edit_profile.php" title="My Profile" id="user_profile_link"><?echo ucfirst($user_info['first_name']) . " " . ucfirst($user_info['last_name']);?></h3></a></li>
                            <li><a href="index.php"><img src="images/home2.png" height="20" width="30" title="Home"</a></li>
                            <li><a href="messages.php"><img src="images/mailbox.png" height="20" width="30" title="Messages"></a></li>
                            <li><a href="listings.php"><img src="images/listings.png" height="20" width="30" title="My Listings"></a></li>
                            <li><a href="logout.php"><img src="images/logout.png" height="20" width="60"></a></li>
                        </span>
                       <? } else { ?>
                            <form action="profile.php" method="post" name="log_in_form" id="log_in_form">
                                <label for="email">Email: </label>
                                <input type="email" name="email" id="email">
                                <label for="password">Password: </label>
                                <input type="password" name="password" id="password">
                                <input type="submit" value="Log In">
                            </form>
                        <span id="create"><a href="create.php">Create Account</a></span>
                         <span id="error_message"></span>
                        <? }?>

                    </ul>
                </nav>
            <h1 id="header_title">Project Taurus</h1>
        </header>
            <!-- Main Article -->
            <article id="main_container">
                <!-- Section for search box container -->
                <section id="search_box">
                    <p>Enter textbook name:</p>
                    <!-- Code for search bar implementation-->
                        <!-- Search Bar -->
                    <form action="search.php" method="get" name="search_bar">
                        <input type="text" name="name" size="75" >
                        <input type="submit" value="Search">
                    </form>
                    
                </section>
				<!--
                <p>Note: Demo Accounts: Email: bobsaget@gmail.com Password: password</p>
                <p>Note: Demo Accounts: Email: dave@gmail.com Password: Password</p>
				-->
                <!--
                <p>Note: Demo Accounts: Email: kpbeyers@uark.edu Password: Password</p>
                <p>Note: Demo Accounts: Email: bstricke@uark.edu Password: Password</p>
                -->
            </article>
            <footer>
                <p></p>
            </footer>
    </body>
</html>
    