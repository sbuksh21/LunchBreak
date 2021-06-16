<?php

//Including constants for site url
include('../config/constants.php');

// Close the session
session_destroy(); // Unsets User session and logout the system

//Redirecting to login page
header('location:'.SITEURL. 'admin/adminlogin.php');

?>