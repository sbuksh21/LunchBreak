<?php include('fixed/menu.php'); ?>

<!--- Main starts here -->

<div class = "main-content">
<div class = "wrapper">
    <h2> Food Management</h2>
<br> <br>


  <!--- Button Add Food --->
  <a href = "<?php echo SITEURL;?>admin/food-add.php" class = "btn-primary">Add Food</a> 
  
        <?php
            
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            
            ?>

  <br>  <br>  <br>

    <table class = "tblfull">
        <tr>
            <th>S.N</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>
            <td>1.</td>
            <td>Salwa Imam Buksh</td>
            <td>sbuksh</td>
            <td>
            <a href = "#" class = "btn-secondary">Update Admin</a> 
            <a href = "#" class = "btn-danger">Delete Admin</a> 
            </td>
    
    </table>

</div>
</div>

<!--- Main ends here -->

<?php include('fixed/footer.php') ?>