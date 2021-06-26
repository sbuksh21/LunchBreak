<?php include('fixed/menu.php'); ?>

<div class = "main-content">
<div class = "wrapper">
    <h2> Change Password</h2>
    <br> 

    <?php

    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
    }

    ?>

    <form action =  "" method="POST">
    <table class = "table">
            <tr>
                <td>Current Password: </td>
                <td><input type= "password" name ="current_password" placeholder="Current Password">
                </td>
            </tr>

            <tr>
                <td>New Password: </td>
                <td><input type= "password" name ="new_password" placeholder = "New Password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required value>
                </td>
            </tr>
            <tr>
                <td>Confirm Password: </td>
                <td><input type= "password" name ="confirm_password" placeholder = "Confirm Password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required value>
                </td>
            </tr>
            <tr>
                <td colspan = "2"> <br>
                   <input type = "hidden" name = "id" value = <?php echo $id;?>>
                    <input type = "submit" name = "submit" value = "Change Password"class = "btn-secondary">
                </td>
                </tr>
            
</table>
</form>
</div>
</div>

<?php
//Checking whether submit is clicked or not
if(isset ($_POST['submit']))
{

// To get all the values from form to change password of admin user
$id = mysqli_real_escape_string($conn, trim($_POST['id']));
$current_password = mysqli_real_escape_string($conn, trim(md5($_POST['current_password'])));
$new_password = mysqli_real_escape_string($conn, trim(md5($_POST['new_password'])));
$confirm_password = mysqli_real_escape_string($conn, trim(md5($_POST['confirm_password'])));

// Query to change password of admin user
$sql = "SELECT * FROM tbl_admin WHERE id=$id AND password ='$current_password'";
   
//Executing the query
   $res = mysqli_query($conn, $sql);

   if($res == TRUE)
   {
       // Check the data 
       $count = mysqli_num_rows($res);

       if($count==1)
       {

        //Checking password matched
        if($new_password==$confirm_password)
        {
                $sql2 = "UPDATE tbl_admin SET
                password = '$new_password'
                WHERE id = $id 
                " ;

                // Running query
                $res2 = mysqli_query($conn, $sql2);

                // To check query run successfully or not
                if($res2 == TRUE)
                {
                    $_SESSION['pwd-change'] = "<div class = 'success'> Password Changed Successfully. </div>";
                    // Redirecting
                    header('location:'.SITEURL.'admin/adminpage.php');
                }
                else
                {
                    $_SESSION['pwd-change'] = "<div class = 'failed'> Password Failed to Change. </div>";
                    // Redirecting
                    header('location:'.SITEURL.'admin/adminpage.php');
                }
        }
           
       }
       else
       {
           // Failed to update admin
           $_SESSION['user-not-found'] = "<div class = 'failed'> User does not exist. </div>";
           // Redirecting
           header('location:'.SITEURL.'admin/adminpage.php');
       }
    }
}
?>

<?php include('fixed/footer.php') ?>