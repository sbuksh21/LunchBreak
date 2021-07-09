<?php include('fixed/menu.php'); ?>

<!--- Main starts here -->

<div class = "main-content">
<div class = "wrapper">
    <h2> Food Management</h2>


<?php
            
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['wipe']))
            {
                echo $_SESSION['wipe'];
                unset($_SESSION['wipe']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['upload_failed']))
            {
                echo $_SESSION['upload_failed'];
                unset($_SESSION['upload_failed']);
            }

            if(isset($_SESSION['failed_replace']))
            {
                echo $_SESSION['failed_replace'];
                unset($_SESSION['failed_replace']);
            }

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            } 
            
            ?>
<br> <br>
  <!--- Button Add Food --->
  <a href = "<?php echo SITEURL;?>admin/food-add.php" class = "btn-primary">Add Food</a> 

  <br>  <br>  <br> <br>

    <table class = "tblfull">
        <tr>
            <th>S.N</th>
            <th>Food Name</th>
            <th>Price</th>
            <th>Food Image</th>
            <th>Date/Time</th>
            <th>Actions</th>
        </tr>

        <?php

            $sql = "SELECT * FROM tbl_food"; // Query to get all the data of food from database

            $result= mysqli_query($conn,$sql);  //Running the query

            $count = mysqli_num_rows($result); // Counting the rows

            $sn = 1;

            if($count>0)
            {
                // To collect the data of all foods in database
                while($rows=mysqli_fetch_assoc($result))
                {
                    $id = $rows['id'];
                    $food_name = $rows['food_name'];
                    $price = $rows['price'];
                    $image_name = $rows['image_name'];
                    $food_date = $rows['food_date'];

                    ?>
                    <tr>
                    <td><?php echo $sn++ ; ?></td>
                    <td><?php echo $food_name; ?></td>
                    <td>$<?php echo $price; ?></td>
                    <td>
                    <?php  
                        if($image_name=="")
                        {

                            //If there is no picture, below message will be displayed
                            echo "<div class = 'failed'><b> Food picture not available.<b></div>";
                        }
                        else
                        {
                            ?>
                            <img src = "<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width = "110px">
                            <?php
                        }
                    
                    ?>

                    </td>
                    <td><?php echo $food_date ?></td>
                    <td>
                        <a href = "<?php echo SITEURL; ?>admin/food-update.php?id=<?php echo $id; ?>" class = "btn-secondary">Update Food</a> 
                        <a href ="<?php echo SITEURL; ?>admin/food-delete.php?id=<?php echo $id;?>&image_name=<?php echo $image_name; ?>" class = "btn-danger">Delete Food</a> 
                    </td>
                    <tr>
                    <?php

                }
            }
            else // Message to show if there is no food to display
            {
                echo "<tr> <td colspan='6'> <div class = 'failed'><b> No food to display </b></td></tr>";
             
            }

        ?>

           
    
    </table>

</div>
</div>

<!--- Main ends here -->

<?php include('fixed/footer.php') ?>