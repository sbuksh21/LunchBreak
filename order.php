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
                $description = $row['food_description'];
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

                <p class = "food-desc2"> <?php echo $description ;?></p> <br>
                <input type="hidden" name="description" value="<?php echo $description; ?>">

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

            <div class = "order-label"> Payment:</div>
            <input type = "radio" name = "payment" value = "Cash on Delivery"> Cash on Delivery
        
            <br> <br> <br>

            <input type = "submit" name = "submit" value = "Confirm Order" class = "btn btn-primary2">

        </fieldset>

             <!-- Delivery details ends here-->

    </form>

        <?php

            //To fetch the data of the login User to insert it in the order table when the User makes an order
            $user = $_SESSION["user"];
            $query = mysqli_query($conn,"SELECT * FROM tbl_user WHERE username = '$user'");
            $row=mysqli_fetch_array($query);
            $first_name = $row['full_name'];
            $mobile = $row['mobile_number'];
            $email = $row['email'];

    
        // When order is submitted
            if(isset($_POST['submit']))
            {
                
                $food = $_POST['food'];
                $price = $_POST['price'];
                $quantity = $_POST['qty'];
                $payment = $_POST['payment'];
                $total = $price * $quantity ; 
                $status = "Order Confirmed";
                $department = $_POST['department'];
                $floor = $_POST['floor'];
                

                //Inserting the data into order table 
                    $sql1 = "INSERT INTO tbl_order SET 
                    food = '$food' ,
                    price = $price ,
                    qty = $quantity , 
                    food_description = '$description' , 
                    total = $total ,
                    payment = '$payment' ,
                    order_date = NOW() ,
                    order_status = '$status' , 
                    customer_name = '$first_name',
                    customer_phone = $mobile ,
                    customer_email = '$email' , 
                    department = '$department' , 
                    floor = '$floor'  
                    ";
                    
            
           // echo $sql1; die();
            //Running the query
              $result1 = mysqli_query($conn, $sql1) ;
              //$from = "sarah_im@hotmail.com";
              $message = 'Your order has been placed successfully.';

              $order_id = mysqli_insert_id($conn); // To get the id of the requested order 

            // To check the query run successfully or not
            if($result1 == true) 
            {
                $_SESSION['order'] = "<div class = 'text-center success'> Your food has been Ordered Successfully and your order id is $order_id </div>" ;
                $mail_sent = @mail($email,$message, $food);
                header('location:'.SITEURL);
            }
            else
            {
                $_SESSION['order'] = "<div class = 'failure'> Failed to place order. </div>";
                header('location:'.SITEURL);
            }

            }   
        ?>

</div>
</section>


     <!--Food Ordering ends here -->

     <!-- Footer-->
     <?php include('fixed - front/footer.php'); ?>