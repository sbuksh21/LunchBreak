<?php include('config/constants.php'); 

include('fixed - front/login-check.php');

?>
   
    <br>
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
                    <a href="order.php">Order</a>
                </li>

                <li>
                    <a href="<?php echo SITEURL; ?>categories.php">Food Categories</a>
                </li>

                <li>
                    <a href="<?php echo SITEURL; ?>food-menu.php">Food Menu</a>
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

    <!-------   --->

    <br> <br>
    <div class = "container">
    <h3+p class = "text-center"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat 
        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat 
        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat 
        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3> </div>

    <!-- Categories starts here-->
    <section class = "categories">
        <div class = "container">
        <h2 class = "text-center"> Food Categories</h2>
        
        
        <?php 
            // Query to display the categories from the database
            $sql = "SELECT * FROM tbl_category LIMIT 4";
            $result = mysqli_query($conn, $sql); // Running the query
            $count = mysqli_num_rows($result); // Counting the rows to check the availability of categories in database to display it

            if($count>0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $id = $row['id'];
                    $cat_name = $row['cat_name'];
                    $image_name = $row['image_name'];
                    ?>
                        <a href="<?php echo SITEURL; ?>food-category.php?category_id=<?php echo $id;?>">
                        <div class ="box-3 float-container">

                            <?php
                                if($image_name=="") // To check for those categories which dont have picture added  
                                {
                                    echo "<div class = 'failure'> Picture not available</div>";
                                }
                                else
                                {
                                    ?>
                                        <img src ="<?php echo SITEURL; ?>images/categories/<?php echo $image_name ?>" alt="Rice" class= "img-responsive img-curve">
                                    <?php
                                }

                            ?>

                        <h3> <?php echo $cat_name ;?></h3>
                        </a> </div>

                    <?php
                }
            }
            else
            {
                echo "<div class = 'failed'> No Catgories Available to display.</div>";
            }

        ?>

       <div class= "clearfix"></div>
    </div>
    </section>

    <!-- Categories ends here-->

    
    <!-- Food Menu ends here-->
   
    <!-- Footer-->
    <?php include('fixed - front/footer.php'); ?>