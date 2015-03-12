<?php
 // File includes for account system.
 include 'core/init.php';

?>
<!doctype html>
<html>
    <head>
        <title><? echo ucfirst($user_info['first_name']) . "'s";?> Messages</title>
        <meta charset="UTF-8">
        <!-- Regular Stylesheet -->
        <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!-- Header with navigation bar -->
        <header>
            <!-- Heading with name -->
            <h1><?php echo ucfirst($user_info['first_name']) . "'s";?> Messages</h1>
                <!-- Navigation with user controls after signed in -->
                <nav id="top_nav">
                    <ul>
                        <?
                            if($user_info['first_name']){
                                echo " ";
                            }
                            else { ?>
                                <li><a href="login.php">Log In</a></li>
                          <?  }
                        ?>
                        

                        <? 
                        // Displays welcome message if user is logged in
                        if ($user_info['first_name']) { ?>
                                  <li id="welcome">Welcome <?php echo ucfirst($user_info['first_name']) . "!";?></li>
                                  <li><a href="index.php">Home</a></li>
                                  <li><a href="listings.php">Listings</a></li>
                                  <li><a href="messages.php">Messages</a></li>
                                  <li><a href="edit_profile.php">Settings</a></li>
                            
                            
                       <? } ?>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </nav>
        </header>
            <!-- Main Article -->
            <article id="main_container">
                     <!-- Message controls might have to change later -->
                    <nav id="controls">
                        <ul>
                            <li><a href="#">Compose</a></li>
                            <li><a href="#">Edit</a></li>
                            <li><a href="#">Delete</a></li>
                        </ul>
                    </nav>
                        <!-- Section for messages box container -->
                        <section id="messages_box">

                        </section>
            </article>
            <footer>
                <p>&copy;2015</p>
            </footer>
    </body>
</html>