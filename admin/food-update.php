<?php include('fixed/menu.php'); ?>

<!--- Main starts here -->

<div class = "main-content">
<div class = "wrapper">
    <h2> Update Food</h2>
<br> <br>

<?php
// To get the data of selected id and checking whether id value is set or not
    if(isset($_GET['id']))
    {

        $id = $_GET['id'];

        $sql1 = "SELECT * FROM tbl_food WHERE id = $id";

        $result = mysqli_query($conn, $sql1);

        //Counting rows 
        $count=mysqli_num_rows($result);

        //Getting the values of each from selected food

        if($count==1)
        {
                // To get all the data of food
                $rows = mysqli_fetch_assoc($result);
                $food_name = $rows['food_name'];
                $description =$rows['food_description'];
                $price = $rows['price'];
                $current_picture = $rows['image_name'];
                $current_category = $rows['category_id'];
                $food_date = $rows['food_date'];
               
        }

        else
        {
            //Redirecting
            $_SESSION['no-food-available'] = "<div class = 'failed'><b> No Food available.</b></div>";
            header('location:'.SITEURL.'admin/adminfood.php');
        }
    }
    else
    {
        header('location:'.SITEURL.'admin/adminfood.php');
    }

    ?>


<form action = "" method = "POST" enctype="multipart/form-data">

<table class = "table">

            <tr>
                <td>Food Name:</td>
                <td>
                    <input type ="text" name = "food_name" value= "<?php echo $food_name ?>">
                </td>
            </tr>

            <tr>
                <td>Food Description:</td>
                <td>
                    <textarea name="description" cols="21" rows="5"><?php echo $description ?> </textarea>
                </td>
            </tr>

            <tr>
                <td> Price: </td>
                <td> <input type = "number" name = "price" value = "<?php echo $price;?>">    
                </td>
            </tr>

            <tr>
                <td> Current Picture: </td>
                <td>  
                <?php

                    // To get the current image from database and displaying it 
                        if($current_picture != "")
                        {
                            ?>
                            <img src = "<?php echo SITEURL; ?>Images/food/<?php echo $current_picture; ?>"width = "200px" >

                            <?php
                        }
                        else
                        {
                            echo "<div class =  'failed'> <b>Picture not found.</b> </div>";
                        }
                    ?>
                </td>

            
                <tr>
                    <td> New Picture: </td>
                    <td>
                    <input type="file" name = "image_name">
                    </td>
                </tr>

            </tr>
            <td> Food Category: </td>
            <td> <select name = "category"> 
                
            <?php

                    // Displaying categories from db
                    // Displaying all the categories
                    $sql = "SELECT * FROM tbl_category";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res); 

                    if($count>0)
                    {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $id = $rows['id'];
                            $food_name = $rows['cat_name'];
                            
                            if($current_category==$id)  // To show the selected category in category dropdown menu
                            {
                                echo "selected" ,"<option value = '$id'>$food_name</option>" ;
                            }
                        
                        }
                    }
                    else
                    {
                        echo "<option value='0'> No Category Available </option>";
                    }
            ?>

            </select>
            </td>
            <tr>
                
            <tr>
            <td>
                      <input type = "hidden" name = "id" value ="<?php echo $id; ?>"> 
                      <input type = "hidden" name = "current_picture" value ="<?php echo $current_picture; ?>"> 
                      <input type = "submit" name = "submit" value ="Update Food" class = "btn-secondary">      
            </td>
            </tr>
</table>
</form>

<?php

if(isset($_POST['submit']))

{
    $id = $_POST['id'];
    $food_name =$_POST['food_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $current_picture = $_POST['current_picture'];
    $category = $_POST['category'];


    if(isset($_FILES['image_name']['name']))
    {
         // To get the details of the picture
         $image_name = $_FILES['image_name']['name'];

         // To check whether image is available or not
         if($image_name != "")
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
                $replace_path = "../Images/food/".$current_picture;
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
    else
    {
        $image_name = $current_picture;
    }
    
    //Updating the data in the database 
    $sql2= "UPDATE tbl_food SET
    food_name='$food_name'
    WHERE id =$id
    ";

    //QUERY execution
    $result1 = mysqli_query($conn,$sql2);

    if($result1==true)
    {
        $_SESSION['update'] = "<div class = 'success'><b> Updating Successful.</b></div>";
        header('location:'.SITEURL.'admin/adminfood.php');
        
    }

    else
    {
        //On failure, redirecting with message
        $_SESSION['update'] = "<div class = 'failed'> <b> Failed to Update.</b> </div>";
        header('location:'.SITEURL.'admin/adminfood.php');        
    }

}

?>

</div>
</div>

<!--- Main ends here -->

<?php include('fixed/footer.php') ?>