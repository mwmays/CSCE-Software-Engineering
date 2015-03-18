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
           <!-- Navigation with user controls after signed in -->
                <nav id="top_nav">
                    <ul>
                        <li><a href="#">Link1</a></li>
                        <li><a href="#">Link2</a></li>
                        <li><a href="#">Link3</a></li>
                        <? 
                        // Displays welcome message if user is logged in
                        if ($user_info['first_name']) { ?>
                        <span id="user_controls">
                            <li><h3><a href="edit_profile.php"><?echo ucfirst($user_info['first_name']) . " " . ucfirst($user_info['last_name']);?></h3></a></li>
                            <li><a href="index.php"><img src="images/home.png" height="20" width="30" title="Home"</a></li>
                            <li><a href="messages.php"><img src="images/mailbox.png" height="20" width="30" title="Messages"></a></li>
                            <li><a href="listings.php"><img src="images/listings.png" height="20" width="30" title="My Listings"></a></li>
                            <li><a href="logout.php"><img src="images/logout.png" height="20" width="60"></a></li>
                        </span>
                       <? } else { ?>
                            <form action="profile.php" method="post">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password">
                                <input type="submit" value="Log In">
                            </form>
                        <? }?>

                    </ul>
                </nav>
        </header>
            <!-- Main Article -->
            <article id="main_container">
                <!-- Section for messages box container -->
                <h1>Edit Profile</h1>
                <section id="update_box">
                    <form action="" method="post">
                        <label for="first_name">First Name: </label>
                            <input type="text" name="first_name" id="first_name" placeholder="<? echo $user_info['first_name']; ?>">
                            <br />
                        <label for="last_name">Last Name: </label>
                            <input type="text" name="last_name" id="last_name" placeholder="<? echo $user_info['last_name']; ?>">
                            <br />
                        <label for="update_email">Email: </label>
                                <input type="text" name="update_email" id="update_email" style="width: 150px" placeholder="<? echo $user_info['email']; ?>">
                                <br />
                            <label for="update_password">Password: </label>
                                <input type="password" name="update_password" id="update_password">
                                <br />
                            <label for="update_verify_password">Verify Password: </label>
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