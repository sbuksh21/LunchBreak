<?php include('fixed/menu.php'); ?>

<div class = "main-content">
    <div class = "wrapper">
        <h2> Update Admin</h2>
        <br>  

        <form action =  "" method="POST">

        <table class = "tbl-2">
            <tr>
                <td>Full Name: </td>
                <td><input type= "text" name ="full_name" value = "">
                </td>
            </tr>

            <tr>
                <td>Username: </td>
                <td><input type= "text" name ="username" value = "">
                </td>
            </tr>

            <tr>
                <td colspan = "2">
                    <input type = "submit" name = "submit" value ="Update Admin" class = "btn-secondary"> </td>
            </tr>
        </table>
    </form>
    </div>
</div>

<?php include('fixed/footer.php'); ?>
