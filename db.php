<?php
$hostname="localhost";
$username="root";
$passwd="password";
$dbname="homeless_db";


$con = mysqli_connect($hostname, $username, $passwd, $dbname);
if(!$con)
	die("Database connection error". mysqli_connect_errno());


?>

