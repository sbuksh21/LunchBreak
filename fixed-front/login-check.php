<?php

//Checking whether user is login or not
if(!isset($_SESSION['user']))  // If user session is not set
{
    //User is not login

    // Redirecting with message
    $_SESSION['no-login-message'] = "<h4 class = text2> Please login to access food order page.</h4>";

    //Redirecting to login page
    header('location:'.SITEURL.'login.php');

}

?>