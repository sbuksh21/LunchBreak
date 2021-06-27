<?php include('fixed/menu.php'); ?>

<!--- Main starts here -->

<div class = "main-content">
<div class = "wrapper">
    <h2> Add  Category</h2>
    

        <?php

        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if(isset($_SESSION['upload_image']))
        {
            echo $_SESSION['upload_image'];
            unset($_SESSION['upload_image']);
        }

        ?>
<br> <br>
      <!--- Adding a New Food Category --->
 <form action = "" method = "POST" enctype="multipart/form-data">

    <table class = "table">
    <tr>
        <td> Category Name : </td>
        <td>
           <input type="text" name = "cat_name" placeholder = "Category Name" required value>
        </td>
    </tr>

    <tr>
        <td> Choose Picture: </td>
        <td>
           <input type="file" name = "image_name">
        </td>
    </tr>

    <tr>
        <td> Status: </td>
        <td>
           <input type="radio" name = "status" value = "Available" required value> Available
           <input type="radio" name = "status" value = "Not Available" required value> Not Available
        </td>
    </tr>

    <tr> 
                <td colspan = "2"> <br>
                    <input type = "submit" name = "submit" value ="Add Category" class = "btn-secondary"> </td>
            </tr> 
</table>
</form>
<!--- Adding a New Food Category --->

<?php

if(isset($_POST['submit']))
{
  
    // Getting the data from form
    $cat_name = mysqli_real_escape_string($conn, trim($_POST['cat_name']));


    // Checking whether radio selection is chosen or not to avoid error
    if(isset($_POST['status']))
    {
        $status = $_POST['status'];
    }

    else
    {
        // Setting the value as default 
        $status = "Not Available";
    }


        //Image choosen or not
     if(isset($_FILES['image_name']['name']))

     {
         //To upload the picture (to upload image path should be included)
        $image_name =$_FILES['image_name']['name'];
        $sourcepath = $_FILES['image_name']['tmp_name']; 
        $destinationpath = "../Images/categories/".$image_name;
    
        //Successfully uploading the picture
        $upload= move_uploaded_file($sourcepath, $destinationpath);
    
        if($upload==false)
        {
            //Display the message on failure
            $_SESSION['upload_image'] = "<div class = 'failed'><b> Please choose and insert picture as well to add new category.</b> </div>";
            header('location:'.SITEURL.'admin/add-category.php');
            
            // We will stop this process if we failed to insert the picture so we will not add the data into database
                die();
        }
           
        }

    //Query to insert the data to db
    $sql= "INSERT INTO tbl_category SET
    cat_name='$cat_name' ,
    image_name = '$image_name' ,
    status='$status' , 
    cat_date = NOW()
    ";

    //Executing query
    $result = mysqli_query($conn, $sql);

    // Checking query
    if($result==true)
    {
        //on success
        $_SESSION['add'] = "<div class = 'success'> <b>New Category Added. </b></div>";
        //Redirecting
        header('location:'.SITEURL. 'admin/admincategory.php');
    }
    else
    {
        //on fail
        $_SESSION['add'] = "<div class = 'failed'><b> Failed to Add. </b></div>";
        //Redirecting
        header('location:'.SITEURL. 'admin/add-category.php');

    }
}


?>



</div>
</div>
            







<?php include('fixed/footer.php') ?>