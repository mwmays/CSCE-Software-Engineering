<html>
    <head>
        <title>Log In</title>
        <meta charset="UTF-8">
        <!-- Regular Stylesheet -->
        <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <header>
            <!-- Heading with name -->
            <h1>Log In</h1>
                <!-- Navigation with user controls after signed in -->
                <nav id="top_nav">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                    </ul>
                </nav>
        </header>
             <!-- Main Article -->
             <article id="main_container">
                    <!-- Section for search box container -->
                    <section id="login_box">
                        <form action="profile.php" method="post">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email">
                            <br />
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password">
                            <br />
                            <input type="submit" value="Login"></input>
                            <p>Don't have an account? <a href="register.php">Create Account</a></p>
                        </form>
                    </section>
            </article>
            <footer>
                <p>&copy;2015</p>
            </footer>
    </body>
</html>