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
    </head>
    <body>
        <!-- Header with navigation bar -->
        <header>
            <!-- Heading with name -->
            <h1>Project Taurus</h1>
                <!-- Navigation with user controls after signed in -->
                <nav id="top_nav">
                    <ul>
                        <?
                            if($user_info['first_name']){
                                echo " ";
                            }
                            else { ?>
                                <li><a href="login.php">Log In</a></li>
                                <li><a href="register.php">Create Account</a></li>
                          <?  }
                        ?>
                        

                        <? 
                        // Displays welcome message if user is logged in
                        if ($user_info['first_name']) { ?>
                                  <li id="welcome">Welcome <?php echo ucfirst($user_info['first_name']) . "!";?></li>
                                  <li><a href="listings.php">Listings</a></li>
                                  <li><a href="messages.php">Messages</a></li>
                                  <li><a href="edit_profile.php">Settings</a></li>
                                  <li><a href="logout.php">Log Out</a></li>
                            
                            
                       <? } ?>
                        
                    </ul>
                </nav>
        </header>
            <!-- Main Article -->
            <article id="main_container">
                <!-- Section for search box container -->
                <section id="search_box">
                    <p>Enter an ISBN for a book you would like to see the prices for.</p>
                    <!-- Code for search bar implementation-->
                        <!-- Search Bar -->
                    <form action="search.php" method="get" name="search_bar">
                        <input type="text" name="name" size="75">
                        <input type="submit" value="Search">
                    </form>
                    <!-- Debug
                </section>
            </article>
            <footer>
                <p>&copy;2015</p>
            </footer>
    </body>
</html>
    