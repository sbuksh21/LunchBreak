<?php

// For Image updating 
    if(isset($_FILES['image_name']['name']))
        {
                $image_name = $_FILES['image_name']['name'];

                if($image_name != "")
                {

                //To upload the picture (to upload image path should be included)
                $sourcepath = $_FILES['image_name']['tmp_name']; 
                $destinationpath = "../Images/categories/".$image_name;
                           
                //Successfully uploading the picture
                $upload= move_uploaded_file($sourcepath, $destinationpath);
            
                if($upload==false)
                {
                    //Display the message on failure
                    $_SESSION['upload_failed'] = "<div class = 'failed'><b> Failed to upload.</b> </div>";
                    header('location:'.SITEURL.'admin/admincategory.php');
                    
                    // We will stop this process if we failed to insert the picture so we will not add the data into database
                        die();
                }
                    //To remove and replace the current image of category, creating path for removal
                    if($current_picture!="")
                   { 
                       $replace_path = "/images/categories/".$current_picture;
                       $replace = unlink($replace_path);
                    
                        //On failure, to display message
                        if($replace==false)
                        {
                        $_SESSION['failed_replace'] = "<div class = 'failed'> <b>Failed to replace current picture.</b></div>";
                        header('location:'.SITEURL.'admin/admincategory.php');
                        die(); // stoping further processing
                        }

                   
                    }  
                    else  
                    {
                        $image_name = $current_picture;
                    }
                }
                else
                {
                    $image_name = $current_picture;
                }
    }

    ?>