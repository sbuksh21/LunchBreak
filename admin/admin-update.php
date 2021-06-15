<?php include('fixed/menu.php'); ?>

<div class = "main-content">
    <div class = "wrapper">
        <h2> Update Admin</h2>
        <br> <br>

        <?php
        //1. To get the ID of selected Admin User
        $id=$_GET['id'];

        //2. Query to get the Details of Admin User
        $sql = "SELECT * FROM tbl_admin WHERE id = $id";

        //3. To execute the query
        $res = mysqli_query($conn,$sql);

        //4. To check whether the query run successfully or not
        if($res==TRUE)
        {
            //To check whether data is available or not
            $count = mysqli_num_rows($res);
            if($count ==1)
            {
                //Get Admin user details
                $row = mysqli_fetch_assoc($res);

                $full_name = $row['full_name'];
                $username = $row['username'];
            }
            else{
                
                //Redirect to admin page
                header('location:'.SITEURL. 'admin/adminpage.php');
            }
        }

        ?>
        <form action =  "" method="POST">

        <table class = "tbl-2">
            <tr>
                <td>Full Name: </td>
                <td><input type= "text" name ="full_name" value = "<?php echo $full_name;?>">
                </td>
            </tr>

            <tr>
                <td>Username: </td>
                <td><input type= "text" name ="username" value ="<?php echo $username;?>">
                </td>
            </tr>

            <tr>
                <td colspan = "2">
                    <input type = "hidden" name = "id" value = <?php echo $id;?>>
                    <input type = "submit" name = "submit" value ="Update Admin" class = "btn-secondary"> </td>
            </tr>
        </table>
    </form>
    </div>
</div>

<?php

//Checking whether submit is clicked or not
if(isset ($_POST['submit']))
{
    // To get all the values from form to update the admin user
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    // Query to update admin user
    $sql = " UPDATE tbl_admin SET
    full_name = '$full_name' , 
    username = '$username'
    WHERE id = '$id'
    ";

    //Executing the query
    $res = mysqli_query($conn, $sql);

    // To check query run successfully or not
    if($res == TRUE)
    {
        // Query run and admin user updated
        $_SESSION['update'] = "<div class = 'success'> Admin User Updated. </div>";
        // Redirecting
        header('location:'.SITEURL. 'admin/adminpage.php');
    }
    else
    {
        // Failed to update admin
        $_SESSION['update'] = "<div class = 'failed'> Failed to update Admin User. </div>";
        // Redirecting
        header('location'.SITEURL. 'admin/adminpage.php');
    }    
}

?>

<?php include('fixed/footer.php'); ?>
