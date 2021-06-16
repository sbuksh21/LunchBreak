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

        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <br>
            <!---- Login Form --->
            <form action = "" method="POST" class = "text-center">
           <b> Username:<br>
            <input type = "text" name = "username" placeholder="Enter Username" required value><br> <br>
            Password:<br>
            <input type = "password" name = "password" placeholder="Enter Password" required value> <br> <br>
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
    $password = md5($_POST['password']);

    // Check whether username and password exist or not
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    
    // Running the query
    $res=mysqli_query($conn, $sql);

    // Rows counting to check admin user exist or not
    $count = mysqli_num_rows($res);

    if($count==1)
    {
        // Admin User exist
        $_SESSION['login'] = "<div class = 'success' > <b>Login Successful.</b></div>";
        //Redirecting to admin home page
        header('location:'.SITEURL.'admin/');
    }
    else
    {
        // Admin User does not exist
        $_SESSION['login'] = "<div class = 'failed text-center' ><b> Username and Password did not match.</b></div>";
        //Redirecting to admin home page
        header('location: '.SITEURL. 'admin/adminlogin.php');
    }
}

?>

<?php include('fixed/footer.php') ?>

