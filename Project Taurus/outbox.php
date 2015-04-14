<?php
 // File includes for account system.
 include 'core/init.php';

?>
<!doctype html>
<html>
    <head>
        <title><? echo ucfirst($user_info['first_name']) . "'s";?> Outbox</title>
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
            <h1 id="header_title">Outbox</h1>
        </header>
            <!-- Main Article -->
            <article id="main_container">
                        <!-- Section for messages box container -->
                        <section id="messages_box">
                           <?php  



$user = $user_info['email'];
$sql = mysql_query("SELECT * FROM messages WHERE from_user = '$user'")or die(mysql_error());

while($row = mysql_fetch_array( $sql ))
{
/* I have set each element into it's OWN echo statement for easy readind.
 however it is possible to create it in one echo statement like the following:
 echo "Message ID#: ".$row['id'];
*/
  echo "<table border=1>";
  
  echo "</td></tr>";
  echo "<tr><td>";
  echo "To: ";
  echo $row['to_user'];
  echo "</td></tr>";
  echo "<tr><td>";
  echo "From: ";
  echo $row['from_user'];
  echo "</td></tr>";
  echo "<tr><td>";
  echo "Message: ";
  echo $row[message];
  echo "</td></tr>";
  echo "</br>";
?>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<table border="0">
<tr><td colspan=2></td></tr>
<tr><td></td><td>
<input type="hidden" name="id" maxlength="5" value = "<?php echo $row['id']; ?>">
</td></tr>
<tr><td colspan="2" align="right">

</table>
</form>

<?php
}
  echo "</table>";
  echo "</br>";
?>
                        </section>
            </article>
            <footer>
                <p>&copy;2015</p>
            </footer>
    </body>
</html>