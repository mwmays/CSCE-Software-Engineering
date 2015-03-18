<?php 
$connect_error = 'Sorry, we\'re experiencing technical difficulties.';
mysql_connect('localhost', 'root', 'password') or die($connect_error);
mysql_select_db('users') or die($connect_error);
?>