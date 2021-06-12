<?php
// Start session
session_start();

//Create constants 
define('SITEURL', 'http://localhost/LunchBreak/');
define('LOCALHOST', 'localhost'); 
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'lunchbreak');

// Connection 
$conn = mysqli_connect(LOCALHOST , DB_USERNAME , DB_PASSWORD, DB_NAME) or die(mysqli_error()); // Connect to the database
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Choosing database

?>
