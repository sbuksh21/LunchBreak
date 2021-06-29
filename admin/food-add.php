<?php include('fixed/menu.php'); ?>

<!--- Main starts here -->

<div class = "main-content">
<div class = "wrapper">
    <h2> Add Food</h2>
   
<br>

<form action ="" method = "POST" enctype = "multipart/form-data">  

<table class = "table">
    <tr>
        <td>Food Name:</td>
        <td>
            <input type ="text" name = "food_name" placeholder = "Food Title">
        </td>
    </tr>

    <tr>
        <td>Food Description:</td>
        <td>
            <textarea name="description" cols="21" rows="5" placeholder = "Food Description"> </textarea>
        </td>
    </tr>

    <tr>
        <td> Price: </td>
        <td> <input type = "number" name = "price">    
        </td>
    </tr>

    <tr>
        <td> Choose Image: </td>
        <td> <input type = "file" name = "image">    
        </td>
    </tr>

    <tr>
        <td> Food Category: </td>
        <td> 
        <select name = "category">

            <?php

            // Displaying categories from db
            // Displaying only available categories
            $sql = "SELECT * FROM tbl_category";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res); 

            if($count>0)
            {
                while($rows=mysqli_fetch_assoc($res))
                {
                    $id = $rows['id'];
                    $food_name = $rows['cat_name'];
                    
                    ?>

                    <option value = "<?php echo $id; ?>"><?php echo $food_name; ?> </option>

                    <?php
                }
            }
            else
            {
                ?>
                <option value="0"> No Category Available </option>

                <?php
            }

            ?>
        </select>     
        </td>
    </tr>

    <tr>
        <td colspan= "2">
            <input type = "submit" name = "submit" value = "Add Food" class= "btn-secondary">
        </td>
    </tr>

</table>
</form>


<?php

if(isset($_POST['submit']))
{
    $food_name = $_POST['food_name'];
    $description = trim($_POST['description']);
    $price = $_POST['price'];
    $category = $_POST['category'];


    // Image Selection part
    if(isset($_FILES['image']['name']))
    {
        $image_name = $_FILES['image']['name'];

        if($image_name !="") //Checking whether Image is selected
        {
            $extension = end(explode('.', $image_name));
            $image_name = "Food_".rand(0000,5555).".".$extension;
            $src =$_FILES['image']['tmp_name'];
            $dst = "../Images/food/".$image_name;
            $upload = move_uploaded_file($src, $dst);

            //Checking whether imagae uploaded or not
            if($upload==false)
            {
                $_SESSION['upload'] = "<div class = 'failed'> Failed to upload Image.</div>";
                header('location:'.SITEURL.'admin/food-add.php'); //Redirecting
                die(); // Stoping further processing
            }
        }
        }
        else
        {
            $image_name = "";
        }

    // Query to add New food 
    $sql1 = "INSERT INTO tbl_food SET 
    food_name = '$food_name',
    food_description ='$description',
    price = $price ,
    image_name = '$image_name',
    category_id = $category,
    food_date = NOW()
     ";
   
    //Query Execution
    $res1 = mysqli_query($conn, $sql1);

    if($res1==true)
    {
        $_SESSION['add'] = "<div class = 'success'><b> New Food added successfuly.</b></div>";
        header('location:'.SITEURL.'admin/adminfood.php'); // Redirecting to admin food page
    }
    else
    {
        $_SESSION['add'] = "<div class = 'failed'><b> Failed to add new food.</b></div>";
        header('location:'.SITEURL.'admin/adminfood.php'); // Redirecting to admin food page
    }

}

?>

</div>
</div>  
<?php include('fixed/footer.php') ?>