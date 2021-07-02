<?php 

include('fixed - front/menu.php'); 

?>

<!--Food Categories Section starts here-->
<section class ="categories">
    <div class = "container">
    <h2 class = "text-center">Food Categories </h2>
  

    <?php 
            // Query to display the categories from the database
            $sql = "SELECT * FROM tbl_category";
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
                                    echo "<div class = 'failure'> <b> Picture not available </b></div>";
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
                echo "<div class = 'failure'> No Catgories Available to display.</div>";
            }

        ?>

</div>
    </section> 
   

<div class = "clearfix"> </div>
    </div>
    
    <br> <br> <br> <br> <br> <br> 
         
<!-- Footer-->
<?php include('fixed - front/footer.php'); ?>
   

