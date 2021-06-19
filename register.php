
<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LunchBreak</title>
   <!--- Linking CSS file -->
   <link rel = "stylesheet" href="css/style.css">
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
                    <a href="index.php">Home</a>
                </li> 
                <li>
                    <a href="order.html">Order</a>
                </li>

                <li>
                    <a href="categories.html">Food Categories</a>
                </li>

                <li>
                    <a href="food menu.html">Food Menu</a>
                </li> 

            </ul>
        </div>
        <div class = "clearfix"> </div>

    </section>
<!-- Navbar ends here-->

    <!-- Banner starts here-->
    <section class="food-banner">
        <div class ="container">
        </div>
    </section>
    <!-- Banner ends here-->
    <?php

// Taking the values from form for User data and saving it in the database


//Checking whether submit is clicked or not
    if(isset($_POST['submit']))
    {
        //Get the user data from form
         $full_name = $_POST['full_name'];
         $mobile_number = $_POST['mobile_number'];
         $email = $_POST['email'];
         $pass1 = md5($_POST['pass1']);

         //Query to save the data of user in the database

         $sql = "INSERT INTO tbl_user SET
            full_name = '$full_name' ,
            mobile_number = '$mobile_number' ,
            email = '$email' ,
            pass1 = '$pass1'
         ";
         
         // Executing query and saving user data in database
            $re = mysqli_query($conn,$sql) or die(mysqli_error($conn));

        // Checking whether user data is inserted or not
         if($re==TRUE)
         {
             $_SESSION['add'] = "<div class = 'text'> You are now registered";
             //Redirecting
             header("location:".SITEURL);
         }
         else
         {
            $_SESSION['add'] = "Registration Failed";
            //Redirecting
            header("location:".SITEURL.'register.php');
         }
    }

    if(isset($_SESSION['add']))
    {
        echo $_SESSION['add'];
    }
?>

    <!-- Registration starts here-->
   <div class = "container1">
        <form action = "#" METHOD = "POST" class ="register">
            <h2 class = "text-center text-color"> <b>  Register</b></h2>      
        <div class = "design">
            <h4 class = "text-color"> <b> Please enter your data to register and login</h4> </b> <br>
        <div class = "order-label"> Full Name: </div>
        <input type="text" name ="full_name" placeholder="E.g. Sarah John" class = "input-responsive" required>

        <div class = "order-label"> Mobile Number: </div>
        <input type="tel" name ="mobile_number" placeholder="E.g. 97455xxxxx" class = "input-responsive" required>

        <div class = "order-label"> Email: </div>
        <input type="email" name ="email" placeholder="E.g. xxx@gmial.com" class = "input-responsive" required>

        <div class = "order-label"> Password: </div>
        <input type="password" name ="pass1" pattern ="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder = "At least one number and one uppercase and lowercase letter, and at least 8 or more characters" class = "input-responsive" required>

        <div class = "order-label"> Confirm Password: </div>
        <input type="password" name ="pass2" pattern ="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder = "At least one number and one uppercase and lowercase letter, and at least 8 or more characters" class = "input-responsive" required>
            <br> <br> <br> 
        <input type = "submit" name = "submit" value = "submit" class = "btn btn-primary2">
        <br><br> <br> <br>
    </div>
    <br> <br>
    </form>
</div>
<br>
<br>

<!-- Registration ends here-->

<!-- Footer-->
<?php include('fixed-front/footer.php'); ?>

