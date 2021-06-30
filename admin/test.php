
   <?php


   if(isset($_FILES['image_name']['name']))
    {
        // To get the details of the picture
        $image_name = $_FILES['image_name']['name'];

        if($image_name != "")
        {

            $extension = end(explode('.', $image_name)); // To avoid replacing of image if the same image has been used twice
            $image_name = "Category_".rand(000,555).'.'.$extension; // Renaming image name 
            $sourcepath = $_FILES['image_name']['tmp_name']; 
            $destinationpath = "../Images/food/".$image_name;
        
            //Successfully uploading the picture
            $upload= move_uploaded_file($sourcepath, $destinationpath);
        
            if($upload==false)
                {
                //Display the message on failure
                $_SESSION['upload_failed'] = "<div class = 'failed'><b> Failed to upload.</b> </div>";
                header('location:'.SITEURL.'admin/adminfood.php');
                
                // We will stop this process if we failed to insert the picture so we will not add the data into database
                    die();
                }

                // Removing the current image
                 if($current_picture!="")
                 {
                       $replace_path = "/Images/food/".$current_picture;
                       $replace = unlink($replace_path);
                    
                        //On failure, to display message
                        if($replace==false)
                        {
                        $_SESSION['failed_replace'] = "<div class = 'failed'> <b>Failed to replace current picture.</b></div>";
                        header('location:'.SITEURL.'admin/adminfood.php');
                        die(); // stoping further processing
                        }
                 }                      
            }
            else
            {
                $image_name = $current_picture;
            }
        }



      ---------------------------------------------------------------------------------------------------


if(isset($_FILES['image_name']['name']))
    {
         // To get the details of the picture
         $image_name = $_FILES['image_name']['name'];

         // To check whether image is available or not
         if($image_name!="")
         {
            $extension = end(explode('.', $image_name)); // To avoid replacing of image if the same image has been used twice
            $image_name = "Food_".rand(000,555).'.'.$extension; // Renaming image name 
            $sourcepath = $_FILES['image_name']['tmp_name']; 
            $destinationpath = "../Images/food/".$image_name;

            //Successfully uploading the picture
            $upload= move_uploaded_file($sourcepath, $destinationpath);

            if($upload==false)
                {
                //Display the message on failure
                $_SESSION['upload_failed'] = "<div class = 'failed'><b> Failed to upload.</b> </div>";
                header('location:'.SITEURL.'admin/adminfood.php');
                
                // We will stop this process if we failed to insert the picture so we will not add the data into database
                    die();
                }

              if($current_picture!="")
              {
                $replace_path ="../Images/food/".$current_picture;
                $replace = unlink($replace_path);

                //On failure, to display message
                if($replace==false)
                {
                $_SESSION['failed_replace'] = "<div class = 'failed'> <b>Failed to replace current picture.</b></div>";
                header('location:'.SITEURL.'admin/adminfood.php');
                die(); // stoping further processing
                }

              }

            }
            
         }

         else // If picture is not selected, than picture will set to current image
    {
        $image_name = $current_picture;
    }




































