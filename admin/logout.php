<?php

//Including constants for site url
include('../config/constants.php');

// Close the session
session_destroy();

//Redirecting to login page
header('location:'.SITEURL. 'admin/adminlogin.php');

?>