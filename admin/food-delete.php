<?php

Include('../config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image'])) // Checking whether the values are set or not
{

    // Getting the food id and image
    $id = $_GET['id'];
    $image_name = $_GET['image'];

    if($image_name != "")
    {
        //Path of image
        $path = "../images/food/".$image_name;
        //Deleting image from food folder -- Using unlink function to completely delete the file from the folder on success
        $wipe = unlink($path); 

        if($wipe==false)
        {
            // Setting message on failure
            $_SESSION['wipe'] = "<div class = 'failed'> Unsuccessful to remove the food image.</div>";
            //Redirecting
            header('location:'.SITEURL.'admin/adminfood.php');
            //Completely stopping and not moving further
            die();
        }
    }

        //Deleting the food from food table in database
        $sql = "DELETE FROM tbl_food WHERE id =$id";

        //Running the query
        $result = mysqli_query($conn, $sql);

          // Checking the condition
          if($result == true)

          {
              $_SESSION['delete'] = "<div class = 'success'><b> Successfully removed food item.</b></div>";
  
              //Redirecting
              header('location:'.SITEURL.'admin/adminfood.php');
          }
          else
          {
              // On failure message 
              $_SESSION['delete'] = "<div class = 'failed'><b> Failed to remove food item.</b></div>";
              //Redirecting
              header('location:'.SITEURL.'admin/adminfood.php');
          }
}
else
{
    //Redirecting
    header('location:' .SITEURL. 'admin/adminfood.php');
}

?>