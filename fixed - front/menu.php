<?php

include('config/constants.php'); 
include('login-check.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LunchBreak</title>

    <!--CSS File -->
    <link rel= "stylesheet" href="css/style.css">
    
</head>
<body>
    <!-- Navbar starts here-->
    <section class = "nav-bar">
        <div class = "container">
        <div class ="logo">
            <img src ="images/Logo.png" alt="Logo" class ="img-responsive">
        </div>
        <div class="menu text-right">
            <ul>
                <li>
                    <a href="<?php echo SITEURL; ?>">Home</a>
                </li> 
               
                <li>
                    <a href="order.php">Order</a>
                </li>

                <li>
                    <a href="<?php echo SITEURL; ?> categories.php">Food Categories</a>
                </li>

                <li>
                    <a href="food-menu.php">Food Menu</a>
                </li> 

                <li>
                    <a href="user-logout.php">Logout</a>
                </li> 

            </ul>
        </div>
        <div class = "clearfix"> </div>
    </div>
    </section>

    <!-- Navbar ends here-->

    <!-- Banner starts here-->
    <section class="food-banner">
        <div class ="container">
        </div>
    </section>

    <!-- Banner ends here-->
       