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

    <!-- Registration starts here-->
   <div class = "container1">
        <form action = "#" class ="register">
            <h2 class = "text-center text-color"> <b>  Register</b></h2>
            
        <div class = "design">
            <h4 class = "text-color"> <b> Please enter your data to register and login</h4> </b> <br>
        <div class = "order-label"> Full Name: </div>
        <input type="text" name ="full-name" placeholder="E.g. Sarah John" class = "input-responsive" required>

        <div class = "order-label"> Mobile Number: </div>
        <input type="tel" name ="contact" placeholder="E.g. 97455xxxxx" class = "input-responsive" required>

        <div class = "order-label"> Email: </div>
        <input type="email" name ="email" placeholder="E.g. xxx@gmial.com" class = "input-responsive" required>

        <div class = "order-label"> Password: </div>
        <input type="password" name ="password" pattern ="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder = "At least one number and one uppercase and lowercase letter, and at least 8 or more characters" class = "input-responsive" required>

        <div class = "order-label"> Confirm Password: </div>
        <input type="password" name ="password" pattern ="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder = "At least one number and one uppercase and lowercase letter, and at least 8 or more characters" class = "input-responsive" required>
            <br> <br> <br> 
        <input type = "submit" name = "submit" value = "submit" class = "btn btn-primary2">
        <br><br> <br> <br>
    </div>
    <br> <br>
    </form>
</div>
<!-- Registration ends here-->

<!-- Footer starts here-->

<footer class = "Footer">
   
    <p>Copyright <img src="https://img.icons8.com/emoji/15/000000/copyright-emoji.png"/> 2021 LunchBreak.net. All rights reserved. <a href = "#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a> <a href = "#"><img src="https://img.icons8.com/fluent/48/000000/snapchat.png"/></a> <a href = "#"><img src="https://img.icons8.com/color/48/000000/facebook-circled--v4.png"/></a></p>

   </footer>
<!-- Footer ends here-->

</body>
</html>
