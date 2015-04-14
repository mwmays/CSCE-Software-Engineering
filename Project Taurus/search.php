<?php
//just adding a comment to upload again.
 // File includes for account system.
 include 'core/init.php';


	//$query = $_GET["name"];
function search($query){
Global $price1;
Global $price2;

$price1 = '';
$price2 = '';
Global $Amazon;
$Amazon = "http://www.amazon.com/dp/".$query;
	$url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=amazon%20".$query."%20buy%20new.%20price";

$body = file_get_contents($url);
$json = json_decode($body);


$myArray = str_split($json->responseData->results[0]->content);
$out = '$';

for ($i = 0; $i <= sizeof($myArray) - 1; $i++)
{
	if ($myArray[$i] == '$')
	{
		while($myArray[$i] != '.')
		{
			$price1=$price1.$myArray[$i+1];
			$out = $out.$myArray[$i+1];
			$i++;
		}
		$price1 = $price1.$myArray[$i+1].$myArray[$i+2];
		$out = $out.$myArray[$i+1].$myArray[$i+2];
		break;
	}
}
if ($out == '$')
{
	$out = "Amazon does not sell this book";
	$price1 = '0';
	print_r($out);
	echo "<br>";
}
else
{ 
    print_r("Buy new from "."<a href=$Amazon>Amazon</a>"." for ".$out);
	echo "<br>";
	
}


$url = "http://barnesandnoble.com/s/test?keyword=".$query."&store=book";
$myArray = str_split($url);

$Barnes = "http://www.barnesandnoble.com/s/test?keyword=".$query;

Global $Barnes;
$Barnes = "http://www.barnesandnoble.com/s/test?keyword=".$query;
$out = '$';

for ($i = 0; $i <= sizeof($myArray) - 1; $i++)
{
	if ($myArray[$i] == '$')
	{
		while($myArray[$i] != '.')
		{
			$price2 = $price2.$myArray[$i+1];
			$out = $out.$myArray[$i+1];
			$i++;
		}
		$price2 = $price2.$myArray[$i+1].$myArray[$i+2];
		$out = $out.$myArray[$i+1].$myArray[$i+2];
		break;
	}
}
if ($out == '$')
{
	$out = "Barnes and Noble does not sell this book";
	$price2 = '0';
	print_r($out);
	echo "<br>";
}
else
{
	
    print_r("List Price on "."<a href=$Barnes>Barnes and Noble</a>"."  is ".$out);
	echo "<br>";
}
}


function compare_price(){
Global $price1;
Global $price2;
Global $Amazon;
Global $Barnes;

	
	if($price1 != '0' & $price2 != '0'){
		
		if($price1 < $price2){
			$lowest = $price1;
			$name = "<a href=$Amazon>Amazon</a>";
		}
		else{
			$lowest = $price2;
			$name = "<a href=$Barnes>Barnes and Noble</a>";
		}
	
		print_r("We recommend buying from " .$name . " for " .$lowest);
	}
	
	else if($price1 != '0' & $price2 == '0'){
		$lowest = $price1;
		$name = "<a href=$Amazon>Amazon</a>";
		print_r("We recommend buying from " .$name . " for " .$lowest);
	}

	else if($price1 == '0' & $price2 != '0'){
		$lowest = $price2;
		$name = "<a href=$Barnes>Barnes and Noble</a>";
		print_r("We recommend buying from " .$name . " for " .$lowest);
	}
}

?>

<!doctype html>
<html>
    <head>
        <title>Home Page</title>
        <meta charset="UTF-8">
        <!-- Regular Stylesheet -->
        <link href="stylesheets/style.css" rel="stylesheet" type="text/css"/>
        <!-- Core Library Script -->
        <script src="jquery/jquery-1.11.2.min.js"></script>
        <!-- UserInterface Library Script -->
        <script src="jquery/jquery-ui-1.10.4.custom.min.js"></script>
        <!-- Jquery Validation Script -->
        <script src="jquery/jquery.validate.min.js"></script>
        <!-- Additional Methods Script -->
        <script src="jquery/additional-methods.min.js"></script>
        <!-- Plugin Script -->
        <script src="jquery/validation/validate.js"></script>
        
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
                            <li><h3><a href="edit_profile.php" title="My Profile"><?echo ucfirst($user_info['first_name']) . " " . ucfirst($user_info['last_name']);?></h3></a></li>
                            <li><a href="index.php"><img src="images/home.png" height="20" width="30" title="Home"</a></li>
                            <li><a href="messages.php"><img src="images/mailbox.png" height="20" width="30" title="Messages"></a></li>
                            <li><a href="listings.php"><img src="images/listings.png" height="20" width="30" title="My Listings"></a></li>
                            <li><a href="logout.php"><img src="images/logout.png" height="20" width="60"></a></li>
                        </span>
                       <? } else { ?>
                            <form action="profile.php" method="post" name="log_in_form" id="log_in_form">
                                <label for="email">Email: </label>
                                <input type="email" name="email" id="email">
                                <label for="password">Password: </label>
                                <input type="password" name="password" id="password">
                                <input type="submit" value="Log In">
                            </form>
                        <span id="create"><a href="create.php">Create Account</a></span>
                         <span id="error_message"></span>
                        <? }?>

                    </ul>
                </nav>
            <h1>Project Taurus</h1>
        </header>
            <!-- Main Article -->
            <article id="main_container">
                <!-- Section for search box container -->
                <section id="search_box">
                    <p>Enter an ISBN for a book you would like to see the prices for.</p>
                    <!-- Code for search bar implementation-->
                        <!-- Search Bar -->
                    <form action="search.php" method="get" name="search_bar">
                        <input type="text" name="name" size="75" >
                        <input type="submit" value="Search">
                    </form>
                    <?php
$query = $_GET["name"];
printf("<br>");
printf("Retailers selling this book");
printf("<br>");
printf("<br>");
search($query);
printf("<br>");
printf("<br>");
compare_price();
printf("<br>");
printf("<br>");
 $my_ads = mysql_query("SELECT * FROM `adlistings` WHERE `isbn` = '$query'"); 
$num_ads = mysql_num_rows($my_ads);
if($num_ads > 0){
            printf("<br>");
            printf("User listings for this book");
            printf("<br>");
            printf("<br>");
                        while ($row = mysql_fetch_array($my_ads, MYSQL_NUM)){
                            printf("<td>------------------------------------------------------------------------------------------ Title: %s &nbsp; &nbsp; &nbsp; &nbsp; ISBN: %s &nbsp; 
							&nbsp; &nbsp; &nbsp; &nbsp;	Email: %s  &nbsp; &nbsp; &nbsp;  price: $%s.00</td>", $row[2] ,$row[3], $row[5], $row[1]);
                            printf("<br>");
                        }
						
			printf("<br>");
			printf("<br>");
            printf("<br>");
			printf("User comments and ratings for this book");
			printf("<br>");
            printf("<br>");
			mysql_data_seek($my_ads,0);
						while ($row1 = mysql_fetch_array($my_ads, MYSQL_NUM)){
						
							if($row1[6] == 0){ $row1[6] = "no user rating entered."; }
							else if($row1[6] == 1){ $row1[6] = "&bigstar;"; }
							else if($row1[6] == 2){ $row1[6] = "&bigstar;&bigstar;"; }
							else if($row1[6] == 3){ $row1[6] = "&bigstar;&bigstar;&bigstar;"; }
							else if($row1[6] == 4){ $row1[6] = "&bigstar;&bigstar;&bigstar;&bigstar;"; }
							else if($row1[6] == 5){ $row1[6] = "&bigstar;&bigstar;&bigstar;&bigstar;&bigstar;"; }
						
                            printf("<td>------------------------------------------------------------------------------------------ Rating: %s &nbsp; &nbsp; &nbsp; &nbsp;
							Was this book useful? %s &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Comments: %s </td>", $row1[6] ,$row1[7], $row1[4]);
                            printf("<br>");
							
                        }

}
?>
                    
                </section>
                <p>Note: Demo Accounts: Email: bobsaget@gmail.com Password: password</p>
                <p>Note: Demo Accounts: Email: dave@gmail.com Password: Password</p>
                <!--
                <p>Note: Demo Accounts: Email: kpbeyers@uark.edu Password: Password</p>
                <p>Note: Demo Accounts: Email: bstricke@uark.edu Password: Password</p>
                -->
            </article>
            <footer>
                <p>&copy;2015</p>
            </footer>
    </body>
</html>

