<?php
 // File includes for account system.
 include 'core/init.php';

?>
<!doctype html>
<html>
    <head>
        <title><? echo ucfirst($user_info['first_name']) . "'s";?> Profile</title>
        <meta charset="UTF-8">
        <!-- Regular Stylesheet -->
        <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!-- Header with navigation bar -->
        <header>
            <!-- Heading with name -->
            <h1><?php echo ucfirst($user_info['first_name']) . "'s";?> Profile</h1>
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
                <!-- Section for messages box container -->
                <section id="update_box">
                    <form action="" method="post">
                        <label for="update_email">New Email</label>
                                <input type="text" name="update_email" id="update_email">
                                <br />
                            <label for="update_password">New Password</label>
                                <input type="password" name="update_password" id="update_password">
                                <br />
                            <label for="update_verify_password">Verify Password</label>
                                <input type="password" name="update_verify_password" id="verify_password">
                        <br />
                        <input type="submit" value="Submit Changes">
                    </form>
                </section>
                <p>Note: None of this functionality to update account works</p>
            </article>
            <footer>
                <p>&copy;2015</p>
            </footer>
    </body>
</html>