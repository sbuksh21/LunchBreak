<?php include('fixed/menu.php'); ?>

<!--- Main starts here -->

<div class = "main-content">
<div class = "wrapper">
    <h2> Admin Management</h2>
    <br><br>
<?php
if(isset($_SESSION['add']))
{
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}

?>
    <form action=" " method = "POST">

    <table>
        <tr>
            <td>Full Name: </td>
            <td> <input type= "text" name ="full_name" placeholder="Enter Full Name" required value ></td>
            </tr>

            <tr>
            <td>Username: </td>
            <td> <input type= "text" name ="username" placeholder="Enter Username" required value></td>
            </tr>

            <tr>
            <td>Password: </td>
            <td> <input type= "password" name ="password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required value></td>
            </tr>

            <tr> 
                <td colspan = "3"> <br>
                    <input type = "submit" name = "submit" value ="Add Admin" class = "btn-secondary"> </td>
            </tr> 

        </table>


    </form>
</div>
</div>
<?php include('fixed/footer.php') ?>

<?php

//Form processing and saving in database

//To check whether the button is clicked or not

if(isset($_POST['submit']))
{
    // Submiited
 //1. Get value from form

 $full_name = mysqli_real_escape_string($conn, trim( $_POST['full_name']));
 $username = mysqli_real_escape_string($conn, trim ($_POST['username']));
 $password = mysqli_real_escape_string($conn, trim(md5($_POST['password']))); // Password encrypted with MD5

 //2. Query to save data into database
 $sql = "INSERT INTO tbl_admin SET 
  full_name='$full_name',
  username='$username',
  password='$password'

 ";

//3.Execute query to save data in database
 $errors = array();
 $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

//4. Check whether the data is inserted or not and query has been executed

if($res==TRUE)
{
//New Admin Registered
//Session variable to display message
$_SESSION['add'] = "<div class = 'success'> New Admin has been added";
//Redirecting page to admin
header("location:".SITEURL. 'admin/adminpage.php');
}
else
{
//New Admin not Registered
//Session variable to display message
$_SESSION['add'] = "<div class = 'failed'>Failed to add Admin";
//Redirecting page to add admin page
header("location:".SITEURL. 'admin/add-admin.php');
}

}

?>


