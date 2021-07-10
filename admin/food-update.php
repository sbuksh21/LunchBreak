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

        //Getting the values of each from selected food

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
        header('location:'.SITEURL.'admin/adminfood.php'); // If random id User tries to pass, user will be redirected to adminfood page
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
                        if($current_picture == "")
                        {
                            echo "<div class =  'failed'> <b>Picture not found.</b> </div>"; 
                        }
                        else
                        {
                            ?>
                            <img src = "<?php echo SITEURL; ?>Images/food/<?php echo $current_picture; ?>"width = "200px" >
                            <?php
                        }
                    ?>
                </td>
            </tr>
            
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
                    $sql2 = "SELECT * FROM tbl_category";

                    $res = mysqli_query($conn, $sql2);

                    $count = mysqli_num_rows($res); 

                    if($count>0)
                    {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $cat_id = $rows['id'];
                            $cat_name = $rows['cat_name'];
                            
                            if($current_category==$cat_id)  // To show the selected category in category dropdown menu
                            {
                                echo "selected" ,"<option value = $cat_id>$cat_name</option>" ;
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
    $food_name = $_POST['food_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $current_picture = $_POST['current_picture'];
    $category = $_POST['category'];

    if(isset($_FILES['image_name']['name']))
    {
        $image_name = $_FILES['image_name']['name'];

        if($image_name != "")
        {
            $extension = end(explode('.', $image_name)); // 
            $image_name = "Food_".rand(0000,5555).'.'.$extension; //Renaming the image

            $source_path = $_FILES['image_name']['tmp_name'];
            $destination_path = "../Images/food/".$image_name;

            //Successfully uploading the image
            $upload = move_uploaded_file($source_path, $destination_path);

            if($upload==false)
            {
                $_SESSION['upload_failed'] = "<div class = 'failed'> <b> Failed to upload.</b></div>";
                header('location:'.SITEURL.'admin/adminfood.php');
                die(); // Stopping the process 
            }

            //Replacing the current picture if the current picture is available
            if($current_picture != "")
            {
                $replace_path = "../Images/food/".$current_picture ;
                $replace = unlink($replace_path);

                if($replace==false)
                {
                   $_SESSION['failed_replace'] = "<div class = 'failed'> <b> Failed to replace current picture.</b></div>";
                   header('location:'.SITEURL.'admin/adminfood.php'); 
                   die();
                }
               
            }
        
        }
            else
            {
                $image_name = $current_picture;
            }   
    }
   
    else // If picture is not selected, than picture will set to current image
    {
        $image_name = $current_picture;
    }
    //Query to update the food 

        $sql= "UPDATE tbl_food SET
        food_name = '$food_name' , 
        food_description = '$description' ,
        price = $price ,
        image_name = '$image_name' ,
        category_id = $category , 
        food_date = NOW()
        WHERE id =$id 
        ";

    // To run the query 
    $result4 = mysqli_query($conn, $sql);

    if($result4==true)

    {
        $_SESSION['update'] = "<div class = 'success'><b> Updating Successful.</b></div>";
        header('location:'.SITEURL.'admin/adminfood.php');
    }
    else
    {
        $_SESSION['update'] = "<div class = 'failed'><b> Failed to Update.</b></div>";
        header('location:'.SITEURL.'admin/adminfood.php');  
    }
}

?>

</div>
</div>

<!--- Main ends here -->

<!--- Footer starts here -->

<?php include('fixed/footer.php') ?>

<!--- Footer ends here -->