<?php 

 include('fixed - front/menu.php'); 
?>

<?php
        //To check whether the ID for category id is passed ot not
        if(isset($GET['id']))
        {
            //Getting the id
            $category_id = $_GET['id'];
            //Get the title as per the selected category
            $sql1 = "SELECT cat_name FROM tbl_category WHERE id =$category_id";
            //To run the query
            $result1 = mysqli_query($conn, $sql1);
            //Getting the data from database
            $row = mysqli_fetch_assoc($result1);
            $category_name = $row['cat_name'];

        }
   else // If id is not passed, redirecting to home page
      {
       header('location:'.SITEURL);
      }

     ?>

<!-- Food Category starts here-->

        <section class = "food-menu">
            <div class = "container">

                <h2 class = "text-center"> Foods on <a href = "#"> "<?php echo $category_name; ?>" </a></h2>
                
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
<!-- Food Category starts here-->
      
<!-- Footer-->
        <?php include('fixed - front/footer.php'); ?>