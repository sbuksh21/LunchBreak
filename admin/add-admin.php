<?php include('fixed/menu.php'); ?>

<!--- Main starts here -->

<div class = "main-content">
<div class = "wrapper">
    <h2> Admin Management</h2>
    <br><br>

    <form acton=" " method = "POST">

    <table class = "tbl-2">
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
                <td colspan = "2">
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

 $full_name = $_POST['full_name'];
 $username = $_POST['username'];
 $password = md5($_POST['password']); // Password encrypted with MD5

 //2. Query to save data into database
 $sql = "INSERT INTO tbl_admin SET 
  full_name='$full_name',
  username='$username',
  passsword='$password'

 ";

}


?>


