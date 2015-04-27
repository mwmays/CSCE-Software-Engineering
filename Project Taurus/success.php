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
            <h1>Success!</h1>
        </header>
            <!-- Main Article -->
            <article id="main_container">
                <!-- Section for search box container -->
                <section id="success_box">
                    <?echo "Successfully created account!";?>
                    <a href = "index.php">Go Home</a> 
                    <br />
                
                    
                </section>
            </article>
            <footer>
                <p>&copy;2015</p>
            </footer>
    </body>
</html>