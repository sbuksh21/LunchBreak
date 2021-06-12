<?php include('fixed/menu.php'); ?>

<!--- Main starts here -->

<div class = "main-content">
<div class = "wrapper">
    <h2> Admin Management</h2>
    <br>  

    <?php
    error_reporting(0);
if(isset($_SESSION['add']))
{
    echo $_SESSION['add'] ; // To display session message and the "??" to have a fallback if 'add' is not an array, it will use empty string instead
    unset($_SESSION['add']); // To remove session message 
}
    ?>
<br> <br>
  <!--- Button Add Admin --->
  <br>
  <a href = "add-admin.php" class = "btn-primary">Add Admin</a>  

  <br>  <br>  <br>  

    <table class = "tblfull">
        <tr>
            <th>S.N</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>

        <?php
        //Query to get all admin Users
        $sql = "SELECT * FROM tbl_admin";
        //Run query
        $res = mysqli_query($conn, $sql);
        //Check whether query is run or not
        if($res==TRUE)
        {
            //To count the rows to check whether we have data or not in database
            $rows = mysqli_num_rows($res); // To get all the rows in database

            //Checking the num of rows
            if($rows>0)
            {
                // If we have data in database
                while($rows=mysqli_fetch_assoc($res))  // Using while loop to get all data in the database
                //While loop will run as long we have data in our database
                {
                    //To get the data from database
                    $id=$rows['id'];
                    $full_name=$rows['full_name'];
                    $username=$rows['username'];

                    //Displaying the data from our table in the database
                    ?>
                        <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $full_name;?></td>
                        <td><?php echo $username;?></td>
                        <td>
                        <a href = "#" class = "btn-secondary">Update Admin</a> 
                        <a href = "#" class = "btn-danger">Delete Admin</a> 
                        </td>
                        <tr>
                    <?php
                }
            }
            else{

            }
        }

        ?>
    </table>

</div>
</div>

<!--- Main ends here -->

<?php include('fixed/footer.php') ?>