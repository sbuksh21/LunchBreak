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

        //Image choosen or not
     if(isset($_FILES['image_name']['name']))

     {
         //To upload the picture (to upload image path should be included)
        $image_name =$_FILES['image_name']['name']; 

        if($image_name != "")
        {

        $extension = end(explode('.', $image_name)); // To avoid replacing of image if the same image has been used twice
        $image_name = "Category_".rand(000,555).'.'.$extension; // Renaming image name 
        $sourcepath = $_FILES['image_name']['tmp_name']; 
        $destinationpath = "../Images/categories/".$image_name;
    
        //Successfully uploading the picture
        $upload= move_uploaded_file($sourcepath, $destinationpath);
    
        if($upload==false)
            {
            //Display the message on failure
            $_SESSION['upload_image'] = "<div class = 'failed'><b> Uploading image failed.</b> </div>";
            header('location:'.SITEURL.'admin/add-category.php');
            
            // We will stop this process if we failed to insert the picture so we will not add the data into database
                die();
            }

        }
        }
        else
        {
            $image_name = "";
        }
    
    //Query to insert the data to db
    $sql= "INSERT INTO tbl_category SET
    cat_name='$cat_name' ,
    image_name = '$image_name' , 
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