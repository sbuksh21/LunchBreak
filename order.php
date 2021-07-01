<?php
include('config/constants.php'); 
include('fixed - front/login-check.php');
?>

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
                    <a href="order.php">Order</a>
                </li>

                <li>
                    <a href="categories.php">Food Categories</a>
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
    
    <!--Food Ordering starts here -->
    <section class = "food-order">
    <div class = "container">
    <h1 class = "text-center text-grey"> Fill the form to place your order</h1>

    <form action = "#" class = "order">
        <fieldset>
            <legend> <b> Ordered Food </legend> </b>
            <div class = "food-menu-img">
                <img src = "images/Rice.jpg" alt= "Chicken Teriyaki Rice" class = "img-responsive img-curve">
            </div>
            <div class = "food-desc">
                <h3> Food Name</h3>
                <p class = "food-price"> $5</p>

                <div class = "order-label"> Quantity </div>
                <input type = "number" name = "qty" class = "input-responsive" value="1" required>
            </div>
        </fieldset>

        <fieldset>
            <legend> <b> Delivery Details</legend> </b>
            <div class = "order-label"> Full Name: </div>
            <input type="text" name ="full-name" placeholder="E.g. Sarah John" class = "input-responsive" required>

            <div class = "order-label"> Mobile Number: </div>
            <input type="tel" name ="contact" placeholder="E.g. 97455xxxxx" class = "input-responsive" required>

            <div class = "order-label"> Email: </div>
            <input type="email" name ="email" placeholder="E.g. xxx@gmial.com" class = "input-responsive" required>

            <div class = "order-label"> Department: </div>
            <textarea name ="department" rows = "2" class = "input-responsive" required> </textarea>

            <div class = "order-label"> Floor Number: </div>
            <textarea name ="floor" rows = "2" class = "input-responsive" required> </textarea>

            <div class = "order-label"> Payment: </div>
            <select name = "select">
                    <option value = "" row = "2">Select</option>
                    <option value = "Cash on Delivery" >Cash on Delivery</option>
            </select>
            <br> <br> <br>

            <input type = "submit" name = "submit" value = "Confirm Order" class = "btn btn-primary2">

        </fieldset>
    </form>
</div>
</section>

     <!--Food Ordering ends here -->

     <!-- Footer-->
     <?php include('fixed - front/footer.php'); ?>