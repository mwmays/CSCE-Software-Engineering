<?php
 // File includes for account system.
 include 'core/init.php';

?>
<!doctype html>
<html>
    <head>
        <title><? echo ucfirst($user_info['first_name']) . "'s";?> Listings</title>
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
                        <!--
                        <li><a href="#">Link1</a></li>
                        <li><a href="#">Link2</a></li>
                        <li><a href="#">Link3</a></li>
                        -->
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
                                <input type="password" name="password" id="password">
                                <input type="submit" value="Log In">
                            </form>
                        <? }?>

                    </ul>
                </nav>
            <h1 id="header_title"><? echo ucfirst($user_info['first_name']) . "'s";?> Listings</h1>
        </header>
            <!-- Main Article -->
            <article id="main_container">
               <table>
                    <td>Price</td>
                    <td>Title</td>
                    <td>ISBN-10</td>
                    <td>Comments</td>
                    <? 
                        $post_id = $_GET['post_id'];
                        $price = $_GET['price'];
                        $title = $_GET['title'];
                        $isbn = $_GET['isbn'];
                        $body = $_GET['body'];
                        $userid = $user_info['user_id'];
                        $user_email = $user_info['email'];
						$rating = $_GET['rating'];
						$useful = $_GET['useful'];
                        //echo $price . " " . $title . " " . $isbn . " " . $body . " " . $post_id;
                        // make sure we connect to the adlistings databases
						if(isset($_GET['isbn'])){
					   mysql_query("INSERT INTO `adlistings`( `post_id`, `price`, `title`, `isbn`, `body`,`email`,`rating`,`useful`) VALUES ('$post_id','$price','$title','$isbn','$body','$user_email','$rating','$useful')");
                        }
                        $my_ads = mysql_query("SELECT * FROM `adlistings` WHERE `post_id` = '$userid'"); 
                        while ($row = mysql_fetch_array($my_ads, MYSQL_NUM)){
						
                             printf("<td>$%s &nbsp; &nbsp; &nbsp; %s &nbsp; &nbsp; &nbsp; %s &nbsp; &nbsp; &nbsp;  %s </td>", $row[1], $row[2], $row[3], $row[4]);
                            printf("<br>");
                        }
                        
                    ?>
                    </table>
                <!-- Section for listings box container -->
                <section id="listings_box">
                    <form action="listings.php" method="get" id="adlistings">
                        <input type="hidden" name="post_id" value="<? echo $user_info['user_id']?>"></input>
                        <label for="price">Price - $</label>
                        <input type="text" name="price" id="price" placeholder="0.00" size="2"></input>
                        <label for="title">Title - </label>
                        <input type="text" name="title" id="title" placeholder="Ad title here" size="50"></input>
						<br />
						
						<label for="isbn">ISBN-10 - </label>
                        <input type="text" name="isbn" id="isbn" placeholder="1111111111" size="10"></input>
                        <br />
						<br />
                        <label for="body">Book comments: </label>
                        <br />
                        <textarea rows="4" cols="70" placeholder="book comments here" name="body" id="body"></textarea>
                        <br />
						<br />
						<!-- Need to figure out how to store values    -->
						<select name = "rating" form = "adlistings"> 
						<option value="0">Please rate this book</option>
						<option value="1">&bigstar;</option>
						<option value="2">&bigstar;&bigstar;</option>
						<option value="3">&bigstar;&bigstar;&bigstar;</option>
						<option value="4">&bigstar;&bigstar;&bigstar;&bigstar;</option>
						<option value="5">&bigstar;&bigstar;&bigstar;&bigstar;&bigstar;</option>
						</select>
						<br />
						<br />
						
						<!-- Need to figure out how to store values    -->
						<select name = "useful" form = "adlistings"> 
						<option value="undefined">Was this book useful?</option>
						<option value="yes">Yes</option>
						<option value="no">No</option>
						</select>
						<br />
						<br />
						
						<input type="submit" value="Post">
                        <input type="reset" value="Reset">
                    </form>
                    </section>
					<!--
            <p> Note: book will not post if ther is a ' in any field.</p>
            <p> Note: might need to change to $_POST so book does not post twice on page refresh.</p>
			-->
            </article>
            <footer>
                <p></p>
            </footer>
    </body>
</html>