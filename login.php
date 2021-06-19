


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
    <section class="food-banner2">
        <div class ="container">
        
    <!-- Banner ends here-->

    <?php include('config/constants.php'); ?>

    <!-- Login Starts here -->
   
        <form action = "#" METHOD "POST" class ="login">
            <h2 class = "text-center text-color"> <b>  Login</b></h2>
            <div class = "design2">
            <h4 class = "text-color text-center text-size"> <b> Please enter your username and password to login</h4> </b> <br> <br>
                    <?php

                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                    ?>
    <div class = "order-label"> Username: </div>
    <input type="text" name ="username"  class = "input-responsive" required> <br><br>
    <div class = "order-label"> Password: </div>
    <input type="password" name ="pass1" class = "input-responsive" required> <br> <br> <br> 
    <input type = "submit" name = "submit" value = "submit" class = "btn btn-primary2">
</form>
</div>
</div>
    </section>
        <!-- Login Ends here -->
    <?php

    //  Check whether submit clicked or not
    if(isset($_POST['submit']))

    {
        // Gettng the data from login
        echo $username = $_POST['username'];
        echo $pass1 = md5($_POST['pass1']);

    }

    ?>