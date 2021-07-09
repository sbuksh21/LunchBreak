<?php include('fixed/menu.php'); ?>

<!--- Main starts here -->

<div class = "main-content">
<div class = "wrapper2" >
    <h2> Order Management</h2>

  <br>  

    <table class = "tblfull">
        <tr>
            <th>Order No.</th>
            <th>Food Name</th>
            <th>Food Price</th>
            <th> Quantity</th>
            <th>Order Total</th>
            <th>Order Status</th>
            <th>Order Date</th> 
            <th>Customer Name </th>
            <th>Customer Phone</th>
            <th>Department</th>
            <th>Floor</th>
            <th>Assigned to Waitress</th>
            <th>Action</th>
            
        </tr>
    <?php

    $sql = "SELECT * FROM tbl_order";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            $id = $row['id'];
            $food = $row['food'];
            $price = $row['price'];
            $quantity = $row['qty'];
            $total = $row['total'] ; 
            $status = $row['order_status'];
            $date = $row['order_date'];
            $customer_name = $row['customer_name'];
            $customer_phone = $row['customer_phone'];
            $department = $row['department'];
            $floor = $row['floor'];

            ?>
        <tr>
            <td><?php echo $id ; ?></td>
            <td><?php echo $food ; ?></td>
            <td><?php echo $price ; ?></td>
            <td><?php echo $quantity ; ?></td>
            <td><?php echo $total ; ?></td>
            <td><?php echo $status ; ?></td>
            <td><?php echo $date ; ?></td>
            <td><?php echo $customer_name ; ?></td>
            <td><?php echo $customer_phone ; ?></td>
            <td><?php echo $department ; ?></td>
            <td><?php echo $floor ; ?></td>
            <td></td>
            <td>
            <a href = "<?php echo SITEURL; ?>admin/order-update.php" class = "btn-secondary">Update</a>  
            </td>
        </tr>

        <?php

        }
    }
    else
    {
        echo "<div class = 'failed'>No orders placed";
    }

    ?>

    </table>

</div>
</div>

<!--- Main ends here -->

<?php include('fixed/footer.php') ?>