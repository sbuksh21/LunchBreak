<?php include('fixed/menu.php'); ?>

<!--- Main starts here -->

<div class = "main-content">
<div class = "wrapper">
    <h2> Update Category</h2>
    
    <?php

    if(isset($_GET['id']))
    {

        $id = $_GET['id'];

        $sql = "SELECT * FROM tbl_category WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        //Counting rows 

        $count=mysqli_num_rows($result);

        if($count==1)
        {
                // To get all the data
                $rows = mysqli_fetch_assoc($result);
                $id = $rows['id'];
                $cat_name = $rows['cat_name'];
                $current_picture = $rows['image_name'];
                $status = $rows['status'];
                $cat_date = $rows['cat_date'];
        }

        else
        {
            //Redirecting
            $_SESSION['no-category-available'] = "<div class = 'failed'><b> No Category available.</b></div>";
            header('location:'.SITEURL.'admin/admincategory.php');
        }
    }
    else
    {
        header('location:'.SITEURL.'admin/admincategory.php');
    }

    ?>

<br> <br>
      <!--- Updating Food Category --->
 <form action = "" method = "POST" enctype="multipart/form-data">

    <table class = "table">
    <tr>
        <td> Category Name : </td>
        <td>
           <input type="text" name="cat_name" value="<?php echo $cat_name;?>">
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
                    <img src = "<?php echo SITEURL; ?>Images/categories/<?php echo $current_picture; ?>"width = "200px" >

                    <?php
                }
                else
                {
                    echo "<div class 'error' Image file not found.</div>";
                }

        ?>
    </tr>
    </td>

    <tr>
        <td> New Picture: </td>
        <td>
           <input type="file" name = "image">
        </td>
    </tr>

    <tr>
        <td> Status: </td>
        <td>
           <input <?php if($status=="Available"){echo "checked";} ?> type="radio" name = "status" value = "Available"> Available
           <input <?php if($status=="Unavailable"){echo "checked";} ?> type="radio" name = "status" value = "Unavailable">Unavailable
        </td>
    </tr>

            <tr> 
                <td>
                    <input type = "hidden" name = "current_picture" value ="<?php echo $current_picture; ?>"> 
                    <input type = "hidden" name = "id" value ="<?php echo $id; ?>"> 
                    <input type = "submit" name = "submit" value ="Update Category" class = "btn-secondary"> 
                </td> 
                </tr> 
</table>
</form>

<?php
// When submitted
if(isset($_POST['submit']))

{
    $id = $_POST['id'];
    $cat_name =$_POST['cat_name'];
    $current_picture = $_POST['current_picture'];
    $status = $_POST['status'];
    

    //Updating the data in the database 
    $sql1= "UPDATE tbl_category SET
    cat_name='$cat_name' ,
    status='$status' ,
    cat_date = NOW() 
    WHERE id =$id
    ";


    //QUERY execution
    $result1 = mysqli_query($conn,$sql1);

    if($result1==true)
    {
        $SESSION['update'] = "div class = 'success'><b> Updating Successful.</b></div>";
        header('location:'.SITEURL.'admin/admincategory.php');
    }

    else
    {
        //On failure, redirecting with message
        $_SESSION['update'] = "<div class = 'failed'> <b> Failed to Update.</b> </div>";
        header('location:'.SITEURL.'admin/admincategory.php');
    }
}

?>


</div>
</div>
            







<?php include('fixed/footer.php') ?>