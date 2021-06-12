<?php include('fixed/menu.php'); ?>

<!--- Main starts here -->

<div class = "main-content">
<div class = "wrapper">
    <h2> Admin Management</h2>

    <form acton=" " method = "POST">

    <table class = "tbl-2">
        <tr>
            <td>Full Name: </td>
            <td> <input type= "text" name ="full name" placeholder="Enter Full Name" ></td>
            </tr>

            <tr>
            <td>Username: </td>
            <td> <input type= "text" name ="username" placeholder="Enter Username" ></td>
            </tr>

            <tr>
            <td>Password: </td>
            <td> <input type= "password" name ="password" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"></td>
            </tr>

        </table>


    </form>
</div>
</div>
<?php include('fixed/footer.php') ?>


