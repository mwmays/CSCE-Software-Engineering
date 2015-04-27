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
        		<style>
		* {
    margin: 0px;
    padding: 0px;
}

body {
    margin-left: auto;
    margin-right: auto;
    box-shadow: 5px 0px 5px #888888, -5px 0px 5px #888888;
    width: 980px;
}

#main_container {
    border: .5px solid black;
}

#search_box {
    /*border: 1px solid black; */
    width: 500px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 100px;
    margin-bottom: 100px;
}

#login_box {
    border: 1px solid black; 
    border-radius: 3px;
    margin-right: auto;
    margin-left: auto;
    margin-top: 50px;
    margin-bottom: 100px;
    padding: 10px;
    width: 300px;
}

#welcome {
    background-color: red;
    color: white;
    font-family: arial;
    font-size: 1.25em;
    padding: 1.5px;
    float: left;
 
}

#create_box {
    border: 1px solid black; 
    border-radius: 3px;
    margin-right: auto;
    margin-left: auto;
    margin-top: 50px;
    margin-bottom: 100px;
    padding: 10px;
    width: 300px;
}

#error_box {
    border: 1px solid black; 
    border-radius: 3px;
    margin-right: auto;
    margin-left: auto;
    margin-top: 50px;
    margin-bottom: 100px;
    padding: 10px;
    width: 325px;
}


#error_box label {
    float: left;
    margin-left: 60px;
}


#error_message {
    color: red;
    font-family: 'Trebuchet MS';
}


#update_box {
    border: 1px solid black; 
    border-radius: 3px;
    margin-right: auto;
    margin-left: auto;
    margin-top: 50px;
    margin-bottom: 100px;
    padding: 10px;
    width: 300px;
}

#success_box {
        /*border: 1px solid black; */
    width: 600px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 100px;
    margin-bottom: 100px;
}

#listings_box {
    border: 1px solid black; 
    border-radius: 3px;
    margin-right: auto;
    margin-left: auto;
    margin-top: 50px;
    margin-bottom: 100px;
    padding: 15px;
    width: 580px;
}

#adlistings {
    visibility: visible;
}

#my_ads {
    border: 1px solid black;
}

table {
    width: 775px;
    font-size: 1em;
    border: 0px solid black;
    margin-top: 5px;
    margin-left: auto;
    margin-right: auto;
}
table td{
    padding: 0px;
	border: 0px solid black;
    margin-left: 20px;
    float: left;
}

header {
    border: .5px solid black;
    height: 65px;
}

#header_title{
    color: #000000;
    font-family: 'Trebuchet MS';
    font-size: 1.7em;
    text-shadow: .5px .5px 1px #888888;
    margin-left: 10px;
}

#top_nav {
    background-color: #990000;
    border: 1px solid #990000;
    margin-left: auto;
    margin-right: auto;
    padding: 5px;
    height: 20px;
    width: 967px;
}


#top_nav ul li {
    float: left;
    list-style-type: none;
    margin-left: 15px;
}

#top_nav ul li a {
    text-decoration: none;
    font-family: 'Trebuchet MS';
    color: #ffffff;
    padding: 3px;
    
}

/* Log In form in top_nav */
#top_nav form{
    float: right;
}

#top_nav form label {
    font-family: 'Trebuchet MS';
    color: #ffffff;
    text-shadow: .5px .5px 1px black;
}

/* Controls that show up after user has logged in */
#user_controls {
    float: right;
}

#user_controls h3{
    font-family: arial;
    font-weight: lighter;
}

#create {
    float: right;
    clear: both;
    font-size: .75em;
    margin-top: 20px;
    padding: 2px;
}

#create a {
    color: #454545;
    font-family: 'Trebuchet MS';
    text-decoration: none;
    font-size: .8em;
}

#create a:hover{
    text-decoration: underline;
}

#user_profile_link{
    color: #ffffff;
}

#user_profile_link:hover {
    text-decoration: underline;
}

#user_profile {
    color: #ffffff;
}


#controls ul li {
    float: left;
    list-style-type: none;
    margin-left: 20px;
}

#controls ul li a {
    text-decoration: none;
    font-size: 1em;
}

#search_results {
    background-color: blue;
}

#compose_message_form {
    margin-top: 50px;
    margin-bottom: 50px;
}

footer {
    background-color: #990000;
    border: 1px solid black;
    clear: both;
}

footer p {
    font-family: 'Trebuchet MS';
    color: #ffffff;
    margin: 0px; 
    padding: 0px;
    text-align: center;
}
		</style>
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