
<?php 

// User Access Control

//To check whether User is login or not

if(!isset($_SESSION['user'])) // If User is not set (session)
{
// Admin User is not login

// Redirecting with message 
$_SESSION['no-login'] = "<div class = 'failed text-center'><b> Please login to access Admin Page.</b></div>";

//Redirecting to login page
header('location:'.SITEURL.'admin/adminlogin.php');
}

?>