<?php 
    include 'core/init.php';

    if (empty($_POST) === false) {
       $register_data = array(
            'email'         => $_POST['email'],
            'password'      => $_POST['password'],
            'first_name'    => $_POST['first_name'],
            'last_name'     => $_POST['last_name'],
       );
        register_user($register_data);
        // redirect
         header('Location: success.php');
        exit();
    }
    
?>
<!doctype html>
<html>
    <head>
        <title>Create Account</title>
        <meta charset="UTF-8">
        <!-- Regular Stylesheet -->
        <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
         <header>
                <!-- Navigation with user controls after signed in -->
                <nav id="top_nav">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                    </ul>
                </nav>
        </header>
             <!-- Main Article -->
             <article id="main_container">
                 <h1>Create Account</h1>
                    <!-- Section for search box container -->
                    <section id="create_box">
                        <form action="" method="post">
                            <label for="email">Email</label>
                                <input type="text" name="email" id="email">
                                <br />
                            <label for="password">Password</label>
                                <input type="password" name="password" id="password">
                                <br />
                            <label for="verify_password">Verify Password</label>
                                <input type="password" name="verify_password" id="verify_password">
                                <br />
                            <label for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name">
                                <br />
                            <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" id="last_name">
                                <br />

                            <input type="submit" value="Register">
                            <input type="reset" value="Reset">
        
                        </form>
                    </section>
                        <!--<p>Note: No code to validate user has entered valid info</p>
                        <br />
                        <p>Note: No code to verify if user has already registered</p>
						-->
			</article>
            <footer>
                <p>&copy;2015</p>
            </footer>
    </body>
</html>
