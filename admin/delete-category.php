
<?php

Include('../config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image']))
{
    //Getting the values and deleting it 

    $id = $_GET['id'];
    $image_name = $_GET['image'];

    // Removing the file from category folder
    if($image_name != "" AND $image_name=="")
    {
        //Path of image
        $path = dirname($_SERVER['SCRIPT_FILENAME'])."../images/categories/".$image_name;
        //Deleting image from category folder -- Using unlink function to completely delete the file from the folder on success
        unlink($path);


        //
        if($wipe==false)
        {
            // Setting message on failure
            $_SESSION['wipe'] = "<div class = 'failed'> Unsuccessful to remove.</div>";

            //Redirecting
            header('location:'.SITEURL.'admin/admincategory.php');

            //Completely stopping and not moving further
            die();
        }

    }

        //Query to delete the data
        $sql = "DELETE FROM tbl_category WHERE id = $id" ;

        //Running query
        $result = mysqli_query($conn, $sql);

        if($result == true)

        {
            $_SESSION['delete'] = "<div class = 'success'> Successfully removed category.</div>";
            //Redirecting
            header('location:'.SITEURL.'admin/admincategory.php');
        }

        else
        {
            // On failure message 
            $_SESSION['delete'] = "div class = 'failed'> Failed to remove category.</div>";
        }
}
else
{
    //Redirecting
    header('location:' .SITEURL. 'admin/admincategory.php');
}


?>