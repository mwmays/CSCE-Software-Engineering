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
                        <span id="create"><a href="create.php">Create Account</a></span>
                        <? }?>

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
    