<?php
include('config/constants.php'); 
include('fixed - front/login-check.php');
?>

<?php

$user = $_SESSION['user'];

$data = "SELECT * FROM tbl_user WHERE username = $user" ;

$result = mysqli_query($conn, $data);

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo $row["id"];
    }
}

else
{
    echo "<div class = 'failure'> No Catgories Available to display.</div>";
}

?>

