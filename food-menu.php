<?php 

include('fixed - front/menu.php'); 
      
?>

    <!-- Food Menu starts here-->
    <section class = "food-menu">
        <div class = "container">
            <h2 class = "text-center"> Food Menu </h2>

        <?php

             // Query to display the categories from the database
             $sql1 = "SELECT * FROM tbl_food";
             $result1 = mysqli_query($conn, $sql1); // Running the query
             $count1 = mysqli_num_rows($result1); // Counting the rows to check the availability of categories in database to display it

             if($count1>0)
             {
                while($row = mysqli_fetch_assoc($result1))
                {
                    
                    $food_name = $row['food_name'];
                    $description =$row['food_description'];
                    $price = $row['price'];
                    $food_picture = $row['image_name'];
                    $current_category = $row['category_id'];

                    ?>

                          <div class = "food-menu-box">
                          <div class = "food-menu-img">

                              <?php

                                if($food_picture=="") // To check for those food which dont have picture added  
                                {
                                  echo "<div class = 'fail'><b> Picture not available </b></div>";
                                }

                                else
                                {
                                    ?>
                                        
                                        <img src=" <?php echo SITEURL; ?>images/food/<?php echo $food_picture; ?>" alt= "Chicken Teriyaki Rice" class="img-responsive img-curve">

                                    <?php
                                }

                              ?>
                       
                            </div>
                            <div class = "food-desc">
                            <h3><?php echo $food_name ;?></h3>
                            <p class = "food-price"> $ <?php echo $price ;?></p>
                            <p class = "food-desc2"> <?php echo $description ;?></p> <br>
                            <br>
                            <a href = "#" class ="btn btn-primary"> Place Order</a>
                            </div>
                                
                            </div>

                    <?php
                }

             }

             else
             {
                echo "<div class = 'failed'> No Food Available to display.</div>";
             }

        ?>
                
            <div class = "clearfix"></div>

    </div>
    </section>
    
<!-- Footer-->
<?php include('fixed - front/footer.php'); ?>

