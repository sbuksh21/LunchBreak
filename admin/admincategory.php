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
      // Update category session//

      if(isset($_SESSION['no-category-available']))
      {
          echo $_SESSION['no-category-available'];
          unset($_SESSION['no-category-available']);
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
          <th>Status</th>
          <th>Date/Time</th>
          <th>Action</th>
      </tr>

      <?php

      // Executing query, making connection and counting rows
        $sql = "SELECT * FROM tbl_category";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if($count>0)
        {

          // If there is data in category 

          while($rows=mysqli_fetch_assoc($result))
          {
            $id = $rows['id'];
            $cat_name = $rows['cat_name'];
            $image_name = $rows['image_name'];
            $status = $rows['status'];
            $cat_date = $rows['cat_date'];
           

            ?>

            <tr>
                      <td><?php echo $id ?></td>
                      <td><?php echo $cat_name ?></td>


                      <td>
                      
                        <?php 
                        
                        // Query to check image and display it 
                        if($image_name!=="")

                        {
                          // To display the image, by going inside siteurl--images folder--categorires folder -- to fetch the image and display it
                          ?>
                          <img src="<?php echo SITEURL;?>Images/categories/<?php echo $image_name; ?>" width = "100px"> 
                          <?php
                        }
                        
                       
                        ?> 
                      </td>
                      
                      <td><?php echo $status ?></td>
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
            <td colspan="6"> <div class = "failed"><b> No Category to display.</b></div><td>
            </tr>
            <?php
        }
      ?>

  </table>
</div>
</div>

<!--- Main ends here -->

<?php include('fixed/footer.php') ?>