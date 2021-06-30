<?php include('fixed/menu.php'); ?>

<!--- Main starts here -->

<div class = "main-content">
<div class = "wrapper">
    <h2> Category Management</h2>
    <br> <br>

    <?php

      if(isset($_SESSION['add']))
      {
          echo $_SESSION['add'];
          unset($_SESSION['add']);
      }

    ?>

      <?php
      // Image removal session//

      if(isset($_SESSION['wipe']))
      {
          echo $_SESSION['wipe'];
          unset($_SESSION['wipe']);
      }

      ?>

    <?php
      // Image removal session//

      if(isset($_SESSION['delete']))
      {
          echo $_SESSION['delete'];
          unset($_SESSION['delete']);
      }

      ?>

      <?php
      // category checking session//

      if(isset($_SESSION['no-category-available']))
      {
          echo $_SESSION['no-category-available'];
          unset($_SESSION['no-category-available']);
      }

      // Update category session//
      if(isset($_SESSION['update']))
      {
          echo $_SESSION['update'];
          unset($_SESSION['update']);
      }

      if(isset($_SESSION['upload']))
      {
          echo $_SESSION['upload'];
          unset($_SESSION['upload']);
      }

      if(isset($_SESSION['failed_replace']))
      {
          echo $_SESSION['failed_replace'];
          unset($_SESSION['failed_replace']);
      }

      if(isset($_SESSION['upload_failed']))
      {
          echo $_SESSION['upload_failed'];
          unset($_SESSION['upload_failed']);
      }
      
      ?>

    <br> <br>

      <!--- Button Add Category --->
  <a href = "add-category.php" class = "btn-primary">Add Category</a>  

<br>  <br>  <br>

  <table class = "tblfull">
      <tr>
          <th>S.N</th>
          <th>Category Name</th>
          <th>Picture</th>
          <th>Date/Time</th>
          <th>Action</th>
      </tr>

      <?php

      // Executing query, making connection and counting rows
        $sql = "SELECT * FROM tbl_category";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result); // Counting rows
        $sn=1; // For serial number of all categories 

        if($count>0)
        {
          // If there is data in category table or not in database
          while($rows=mysqli_fetch_assoc($result))
          {
            $id = $rows['id']; // Data is in  array format
            $cat_name = $rows['cat_name'];
            $image_name = $rows['image_name'];
            $cat_date = $rows['cat_date'];
           
            ?>
                <tr>
                      <td> <?php echo $sn++ ?>. </td>
                      <td><?php echo $cat_name ?></td>
                    
                      <td>
                        <?php 
                        // Query to check image and display it 
                        if($image_name!="")
                        {
                          // To display the image, by going inside siteurl--images folder--categorires folder -- to fetch the image and display it
                          ?>
                          <img src="<?php echo SITEURL;?>Images/categories/<?php echo $image_name; ?>" width = "100px"> 
                          <?php 
                        }
                        else // If image is not added with new category addition, new category will be added and below message will be displayed in the display section 
                        {
                          echo "<div class = 'failed'><b> Picture not added for new category.</b></div>";
                        }
                        
                        ?> 
                      </td>
                      
                      <td><?php echo $cat_date ?></td>
                  
                      <td>
                      <a href = "update-category.php?id=<?php echo $id; ?>" class = "btn-secondary">Update Category</a>
                      <a href = "delete-category.php?id=<?php echo $id; ?> &image=<?php echo $image_name ; ?>" class = "btn-danger">Delete Category</a> <!-- Using get method to get the value of Id delete it and using the image id as well to remove the image from the folder as well-->
                      </td>
                </tr>
                <?php
          }
          
        }
        else
        {
          // If there is no data in category then below message will be displayed
          ?>
            <tr>
                <td colspan="5"> <div class = "failed"><b> No Category to display.</b></div><td>
            </tr>

            <?php
        }
            ?>

  </table>
</div>
</div>

<!--- Main ends here -->

<?php include('fixed/footer.php') ?>