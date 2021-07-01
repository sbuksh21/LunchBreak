<?php include('config/constants.php'); 
    
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
        
        <div class = "clearfix"> </div>
    </div>
    </section>

    <!-- Navbar ends here-->
 
    <!-- Banner starts here-->
    <section class="food-banner">
        <div class ="container">
        
    <!-- Banner ends here-->

    <h2 class = "text-center text-color"> <b>  Login</b></h2>
            <h4 class = "text-color text-center text-size"> <b> Please enter your username and password to login</h4> </b> <br>
    <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo  $_SESSION['no-login-message'];
                    unset ($_SESSION['no-login-message']);
                }

            ?>

    <?php

    //  Check whether submit clicked or not
    if(isset($_POST['submit']))

    {
        // Gettng the data from login
         $username = mysqli_real_escape_string($conn, trim($_POST['username']));
         $pass1 = mysqli_real_escape_string($conn, trim(md5($_POST['pass1'])));   

        // SQL query to check username and password exisit or not
        $sql = "SELECT * FROM tbl_user WHERE username = '$username' AND pass1 = '$pass1'";

         // Executing query
         $re = mysqli_query($conn,$sql);

        //Counting rows to check whether user exisit or not
        $count = mysqli_num_rows($re);

        if($count==1)
        {
            // User exist 
            $_SESSION['login'] ;
            $_SESSION['user'] = $username; // Checking whether user is login or not 
            //Rediretcing   
            header("location:".SITEURL);
        }
        else
        {
            // User doesnt exist
            $_SESSION['login'] = "<h4 class = text2> Login failed.</h4>";
            //Rediretcing
            header("location:".SITEURL.'login.php');
        }
    }

    ?> 
    
    <!-- Login Starts here -->
                     
            <form action = "#" METHOD = "POST" class ="login">
            <div class = "design2">
            <div class = "order-label"> Username: </div>
            <input type="text" name ="username"  class = "input-responsive" required> <br><br>
            <div class = "order-label"> Password: </div>
            <input type="password" name ="pass1" class = "input-responsive" required> <br> <br> <br> 
            <input type = "submit" name = "submit" value = "Login" class = "btn btn-primary2"> <br><br>
            <p class = "text-center"><b> Dont have an account?  <a href="register.php">Register Now</a></b>
             
        </form>
        </div>
        </div>
            </section>
        <!-- Login Ends here -->
    