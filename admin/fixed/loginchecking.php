<?php 

// User Access Control

//To check whether User is login or not

if(!isset($_SESSION['user'])) // If User is not set (session)
{
// Admin User is not login

// Redirecting with message 
$_SESSION['no-login-message'] = "<div class = 'error text-center'> Please login to access Admin Page.</div>";

//Redirecting to login page
header('location: '.SITEURL. 'admin/adminlogin.php');
}

?>