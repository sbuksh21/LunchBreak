<?php
include('config/constants.php'); 
include('fixed - front/login-check.php');
?>

<?php
        //Checking whether id is set or not for the selected food
        if(isset($_GET['food_id']))
       {
            $food_id = $_GET['food_id'];

            // query to get the data of the selected food item
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
            $result = mysqli_query($conn, $sql);
            $count=mysqli_num_rows($result); 

            if($count==1)
            {
                $row= mysqli_fetch_assoc($result); // Getting the data of the selected food item from database

                $food_name = $row['food_name'];
                $price = $row['price'];
                $food_picture = $row['image_name'];
            }
            else
            {
                header('location:'.SITEURL);
            }
       }
        else
       {
            header('location:'.SITEURL);
        }

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

    <form action = "" method = "POST" class = "order">

         <!-- Ordered food details starts here-->

        <fieldset>
            <legend> <b> Ordered Food </legend> </b>
            <div class = "food-menu-img">
               
                <?php

                    if($food_picture=="") // To check for those food which dont have picture added  
                    {
                      echo "<div class = 'fail'><b> Picture not available </b></div>";
                    }
                    else
                    {
                        ?>
                            
                            <img src=" <?php echo SITEURL; ?>images/food/<?php echo $food_picture; ?>" class="img-responsive img-curve">

                        <?php
                    }   
                ?>
            </div>

            <div class = "food-desc">
                <h3> <?php echo $food_name; ?></h3>
                <input type="hidden" name="food" value="<?php echo $food_name; ?>">

                <p class = "food-price"> $ <?php echo $price; ?></p>
                <input type="hidden" name="price" value="<?php echo $price; ?>">


                <div class = "order-label"> Quantity </div>
                <input type = "number" name = "qty" class = "input-responsive" value="1" required>
            </div>
        </fieldset>
                         <!-- Ordered food details ends here-->


        <!-- Delivery details starts here-->

        <fieldset>
            <legend> <b> Delivery Details</legend> </b>

            <div class = "order-label"> Department: </div>
            <textarea name ="department" rows = "2" class = "input-responsive" required> </textarea>

            <div class = "order-label"> Floor Number: </div>
            <textarea name ="floor" rows = "2" class = "input-responsive" required> </textarea>

            <br> <br> <br>

            <input type = "submit" name = "submit" value = "Confirm Order" class = "btn btn-primary2">

        </fieldset>

             <!-- Delivery details ends here-->

    </form>

        <?php
        // When order is submitted
            if(isset($_POST['submit']))
            {
                $food = $_POST['food'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                $total = $price * $qty;

                $order_status = "Ordered";

                $customer_name = "SELECT full_name FROM tbl_user WHERE username = '". $_SESSION['user']. "'" ;

                $department = ['department'];

                $floor = ['floor'];

            // Query to insert the data to database 

            $sql1 = "INSERT INTO tbl_order SET 
           
            customer_name = '$customer_name' 
             
            ";

                $res = mysqli_query($conn, $sql1);

                if($res==true)
                {
                    $_SESSION['order'] = "<div class = 'success'> Food Ordered successfully.</div>" ;
                }
                else
                {
                    header('location:'.SITEURL);
                }
            }


        ?>

</div>
</section>


     <!--Food Ordering ends here -->

     <!-- Footer-->
     <?php include('fixed - front/footer.php'); ?>