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
                    <a href="index.php">Home</a>
                </li> 
                <li>
                    <img src="https://img.icons8.com/color/24/000000/edit-user-male--v1.png"/> <a href="register.php"> Register | </a> <img src="https://img.icons8.com/color/22/fa314a/unlock.png"/><a href="login.php"> Login</a>
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
    </div>
    </section>

    <!-- Navbar ends here-->

    <!-- Banner starts here-->
    <section class="food-banner">
        <div class ="container">
        </div>
    </section>
    <!-- Banner ends here-->

    <!-- Categories starts here-->
    <section class = "categories">
        <div class = "container">
        <h2 class = "text-center"> Food Categories</h2>
        <a href="#">
        <div class ="box-3 float-container">
            <img src ="images/Rice.jpg" alt="Rice" class= "img-responsive img-curve">

        <h3> Rice</h3>
        </div>
         </a>
        <a href="#">
        <div class ="box-3 float-container">
            <img src ="images/Pasta.PNG" alt="Pasta" class= "img-responsive img-curve">

            <h3>Pasta</h3>
        </div>
        </a>
        <a href="#">
        <div class ="box-3 float-container">
            <img src ="images/Potato Chickpea Stew.jpg" alt="Chickpea" class= "img-responsive img-curve">

            <h3>Chickpea</h3>
        </div>

        <a href="#">
        <div class ="box-3 float-container">
            <img src ="images/Potato Chickpea Stew.jpg" alt="Chickpea" class= "img-responsive img-curve">

            <h3>Burger</h3>
        </div>
    </a>
       <div class= "clearfix"></div>
    </div>

    </section>

    <!-- Categories ends here-->

    <!-- Food Menu starts here-->
    <section class = "food-menu">
        <div class = "container">
            <h2 class = "text-center"> Food Menu </h2>
            <div class = "food-menu-box">
                <div class = "food-menu-img">
                    <img src="images/Chicken Rice.jpg" alt= "Chicken Teriyaki Rice" class="img-responsive img-curve">
                </div>
                <div class = "food-desc">
                    <h4>Chicken Rice</h4>
                    <p class = "food-price"> $ 5 </p>
                    <p class = "food-desc2">
                        Teriyaki sauce rice with chicken and mixed vegetables
                    </p>
                    <br>
                    <a href = "#" class ="btn btn-primary"> Order Now </a>
                </div>
                <div class = "clearfix"></div>
            </div>

            <div class = "food-menu-box">
                <div class = "food-menu-img">
                    <img src="images/Shrimp Pasta.jpg" alt= "Shrimp Pasta" class="img-responsive img-curve">
                </div>
                <div class = "food-desc">
                    <h4>Shrimp Pasta</h4>
                    <p class = "food-price"> $ 10</p>
                    <p class = "food-desc2">
                        Pesto shrimp pasta with grated parmesan
                    </p>
                    <br>
                    <a href = "#" class ="btn btn-primary"> Order Now </a>
                </div>
                <div class = "clearfix"></div>
            </div>

            <div class = "food-menu-box">
                <div class = "food-menu-img">
                    <img src="images/Chickpea Salad.jpg" alt= "Pesto Chickpea Salad" class="img-responsive img-curve">
                </div>
                <div class = "food-desc">
                    <h4>Pesto Chickpea Salad</h4>
                    <p class = "food-price"> $ 6 </p>
                    <p class = "food-desc2">
                        Creamy pesto chickpea salad with crackers 
                    </p>
                    <br>
                    <a href = "#" class ="btn btn-primary"> Order Now </a>
                </div>
                <div class = "clearfix"></div>
            </div>
            <div class = "food-menu-box">
                <div class = "food-menu-img">
                    <img src ="images/Broccoli Pasta.jpg " alt = "Broccoli Pasta" class= "img-responsive img-curve">
                </div>
                <div class= "food-desc">
                    <h4> Broccoli Pasta</h4>
                    <p class= "food-price"> $ 11 </p>
                    <p class = "food-desc2">
                        Roasted broccoli with lemon and feeta cheese
                    </p>
                    <br>
                    <a href = "#" class = "btn btn-primary"> Order Now </a>
                </div>
            </div>
            <div class = "clearfix"></div>
    </div>
    </section>
    <!-- Food Menu ends here-->
   
<!-- Footer starts here-->
<footer class = "Footer">
        
    <p>Copyright <img src="https://img.icons8.com/emoji/15/000000/copyright-emoji.png"/> 2021 LunchBreak.net. All rights reserved. <a href = "#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a> <a href = "#"><img src="https://img.icons8.com/fluent/48/000000/snapchat.png"/></a> <a href = "#"><img src="https://img.icons8.com/color/48/000000/facebook-circled--v4.png"/></a></p>

   </footer>
<!-- Footer ends here-->

</body>
</html>