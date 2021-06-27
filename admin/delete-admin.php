<?php
Include('../config/constants.php');

//1. To get the ID of Admin User to delete it
 $id = $_GET['id'];

//2. Query to delete admin User
$sql = "DELETE FROM tbl_admin WHERE id=$id";

//3. Run the query
$res= mysqli_query($conn, $sql);

//4. Checking query execution
if($res==TRUE)
{
    //Query successful and Admin User deleted
    
    //Session variable created to display message
    $_SESSION['delete'] = '<div class = "success"> Admin User deleted successfully.</div>';
    //Redirecting to Admin page
    header('location:' .SITEURL. 'admin/adminpage.php');
}
else{

    //Failed to delete Admin user
    //Session variable created to display message
    $_SESSION['delete'] = "<div class = 'failed'> Failed to delete Admin User.</div>";
    //Redirecting to Admin page
    header('location:' .SITEURL. 'admin/adminpage.php');
}

?>