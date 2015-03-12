<?php 
    include 'core/init.php';

    if (empty($_POST)===false){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // checks to see if form has been filled out
        if(empty($email) === true || empty($password) === true ) {
            $error_message[] = 'Please enter a email and password.';
        }
        // checks to see if user exists in database
        else if(user_exists($email) === false) {
            $error_message[] = 'User doesn\'t exist please create an account.';
        }
        // checks to see if user has verified their account 
        /*else if(user_active($email) === false) {
            $error_message[] =  'You haven\'t verified your account please check your email to verify.';
        }*/
        else {
           $login = login($email, $password);
            if($login === false) {
                $error_message[] = 'The email or password you entered is incorrect.';
            }
            else {
                // Sets the user session.
                $_SESSION['user_id'] = $login;
                
                // Redirects the user home 
                header('Location: index.php');
                exit();
            }
        }
        
        // Prints error messages 
        //print_r($error_message);
    }
    else {
        $error_message[] = 'No data recieved';
    }
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <form action="profile.php" method="post">
            <ul>
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
                <br />
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <br />
                <input type="submit" value="Login"></input>
            </ul>
        <p>Don't have an account? <a href="register.php">Create Account</a></p>
        </form>
        <div id="error_message" style="color: red;">
            <? print_errors($error_message) ?>
        </div>
    </body>
</html>