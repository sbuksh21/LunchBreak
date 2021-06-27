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
                $image_name = $rows['image_name'];
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
           <input type="text" name = "cat_name" value="<?php echo $cat_name;?>">
        </td>
    </tr>

    <tr>
        <td> Current Picture: </td>
        <td>
          Current Picture
        </td>
    </tr>

    <tr>
        <td> New Picture: </td>
        <td>
           <input type="file" name = "image_name">
        </td>
    </tr>

    <tr>
        <td> Status: </td>
        <td>
           <input type="radio" name = "status" value = "Available"> Available
           <input type="radio" name = "status" value = "Not Available"> Not Available
        </td>
    </tr>

            <tr> 
                <td colspan = "2"> <br>
                    <input type = "submit" name = "submit" value ="Update Category" class = "btn-secondary"> </td>
            </tr> 
</table>
</form>



</div>
</div>
            







<?php include('fixed/footer.php') ?>