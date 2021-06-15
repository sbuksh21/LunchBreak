<?php include('../config/constants.php');?>

<html>
    <head>
        <title> Admin Login - LunchBreak</title>
        <link rel = "stylesheet" href = "../css/admin.css">
    </head>

    <body>

    <div class = "login">
        <h1 class = "text-center"> Admin Login</h1>
        <br>
            <!---- Login Form --->
            <form action = "" method="POST" class = "text-center">
           <b> Username:<br>
            <input type = "text" name = "username" placeholder="Enter Username" required value><br> <br>
            Password:<br>
            <input type = "text" name = "password" placeholder="Enter Password" required value> <br> <br>
            <input type = "submit" name = "submit" value = "Login" class = "btn-primary">

    </div>

</body>
</html>

<?php

//Checking submit button clicked or not
if(isset($_POST['submit']))
{
// To get the data from login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check whether username and password exist or not
    $sql = " SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    // Running the query
    $res=mysqli_query($conn, $sql);

}



?>




<?php include('fixed/footer.php') ?>

