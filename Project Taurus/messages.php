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
               <!-- Navigation with user controls after signed in -->
                <nav id="top_nav">
                    <ul>
                        <li><a href="messages.php">Compose</a></li>
                        <li><a href="inbox.php">Inbox</a></li>
                        <li><a href="outbox.php">Outbox</a></li>
                        
                        <? 
                        // Displays welcome message if user is logged in
                        if ($user_info['first_name']) { ?>
                        <span id="user_controls">
                            <li><h3><a href="edit_profile.php" id="user_profile_link"><?echo ucfirst($user_info['first_name']) . " " . ucfirst($user_info['last_name']);?></h3></a></li>
                            <li><a href="index.php"><img src="images/home2.png" height="20" width="30" title="Home"</a></li>
                            <li><a href="messages.php"><img src="images/mailbox.png" height="20" width="30" title="Messages"></a></li>
                            <li><a href="listings.php"><img src="images/listings.png" height="20" width="30" title="My Listings"></a></li>
                            <li><a href="logout.php"><img src="images/logout.png" height="20" width="60"></a></li>
                        </span>
                       <? } else { ?>
                            <form action="profile.php" method="post">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email">
                                <label for="password">Password</label>
                                <input type="text" name="password" id="password">
                                <input type="submit" value="Log In">
                            </form>
                        <? }?>

                    </ul>
                </nav>
            <h1 id="header_title">Compose Message</h1>
        </header>
            <!-- Main Article -->
            <article id="main_container">
                        <!-- Section for messages box container -->
                        <section id="messages_box">
                            <?php    


$message = $_POST['forward2'];
 if (isset($_POST['submit']))
{
// if the form has been submitted, this inserts it into the Database 
  $to_user = $_POST['to_user'];
  $from_user = $user_info['email'];
  $message = $_POST['message'];
  mysql_query("INSERT INTO messages (to_user, message, from_user) VALUES ('$to_user', '$message', '$from_user')")or die(mysql_error());
  echo "Message succesfully sent!"; 
}
else
{
    // if the form has not been submitted, this will show the form
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="compose_message_form">
<table border="0">
<tr><td></td><td>
<input type="hidden" name="from_user" maxlength="32" value = <?php echo $user_info['first_name']; ?>>
</td></tr>
<tr><td>To User: </td><td>
<input type="text" name="to_user" maxlength="32" value = "" placeholder = "user_email@email.com">
</td></tr>
<tr><td>Message: </td><td>
<TEXTAREA NAME="message" COLS=50 ROWS=5 WRAP=SOFT></TEXTAREA>
</td></tr>
<tr><td colspan="2" align="right">
<input type="submit" name="submit" value="Send Message">
</td></tr>
</table>
</form>
<?php
}
?>
                        </section>
            </article>
            <footer>
                <p>&copy;2015</p>
            </footer>
    </body>
</html>