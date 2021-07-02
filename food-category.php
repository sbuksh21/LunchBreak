<?php 

 include('fixed - front/menu.php'); 
?>

<?php
        //To check whether the ID for category id is passed ot not
        if(isset($_GET['category_id']))
        {
            //Getting the id
            $category_id = $_GET['category_id'];
            //Get the title as per the selected category
            $sql = "SELECT cat_name FROM tbl_category WHERE id =$category_id";
            //To run the query
            $result = mysqli_query($conn, $sql);
            //Getting the data from database
            $row = mysqli_fetch_assoc($result);
            $category_name = $row['cat_name'];

        }
   else // If id is not passed, redirecting to home page
      {
       header('location:'.SITEURL);
      }

     ?>

<!-- Food Menu as per Category starts here-->

<section class = "food-menu">
        <div class = "container">

                <h2 class = "text-center"> Foods on <a href = "#"> "<?php echo $category_name; ?>" </a></h2>
                
            <?php

            // Query to get the category-id assigned on each food item in table tbl_food in db
                $sql1 = "SELECT * FROM tbl_food WHERE category_id=$category_id";
                $result1 = mysqli_query($conn, $sql1);
                $count1 = mysqli_num_rows($result1);

                if($count1>0) // Check whether there is any food avaiable as per the assigned category id
                {
                    while($row=mysqli_fetch_assoc($result1))
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
                                            
                                            <img src=" <?php echo SITEURL; ?>images/food/<?php echo $food_picture; ?>" class="img-responsive img-curve">
    
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
    
                 else // If No food added in the selected category
                 {
                    echo "<div class = 'failure'><b> No Food Available to display.</b></div>";
                 }
    
            ?>        
                       
                <div class = "clearfix">  </div>
                <br>
                </section>       
       </div>
     
<!-- Food Menu as per Category ends here-->

        <!-- Footer-->
        
        <?php include('fixed - front/footer.php'); ?>
        