<?php 
$connect_error = 'Sorry, we\'re experiencing technical difficulties.';

//for Klae's computer
//mysql_connect('localhost', 'root', 'password') or die($connect_error);

//for Brandon's computer
mysql_connect('localhost', 'root', '') or die($connect_error);

mysql_select_db('users') or die($connect_error);
?>