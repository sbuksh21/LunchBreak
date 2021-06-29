
<?php

Include('../config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image'])) // Checking whether the values are set or not
{
    //Getting the values and deleting it 

    $id = $_GET['id'];
    $image_name = $_GET['image'];

    // Removing the file from category folder
    if($image_name != "")
    {
        //Path of image
        $path = "../images/categories/".$image_name;
        //Deleting image from category folder -- Using unlink function to completely delete the file from the folder on success
        $wipe = unlink($path);

        //On failure to display message
        if($wipe==false)
        {
            // Setting message on failure
            $_SESSION['wipe'] = "<div class = 'failed'> Unsuccessful to remove the image.</div>";
            //Redirecting
            header('location:'.SITEURL.'admin/admincategory.php');
            //Completely stopping and not moving further
            die();
        }
    }
        //Query to delete the category from database
        $sql = "DELETE FROM tbl_category WHERE id = $id" ;

        //Running query
        $result = mysqli_query($conn, $sql);

        // Checking the condition
        if($result == true)

        {
            $_SESSION['delete'] = "<div class = 'success'> Successfully removed category.</div>";

            //Deleting image from Images/Categories folder as well
            unlink($path);

            //Redirecting
            header('location:'.SITEURL.'admin/admincategory.php');
        }
        else
        {
            // On failure message 
            $_SESSION['delete'] = "<div class = 'failed'> Failed to remove category.</div>";
        }
}
else
{
    //Redirecting
    header('location:' .SITEURL. 'admin/admincategory.php');
    mysqli_close($conn); // closing connection
}

?>

