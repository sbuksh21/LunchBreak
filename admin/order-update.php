<?php 

include('fixed/menu.php');

?>

<!--- Main starts here -->

<div class = "main-content">
<div class = "wrapper" >
    <h2> Update Order</h2>

  <br>  

  <?php

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_order WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if($count==1)
        {
            $row = mysqli_fetch_assoc($result);

            $status = $row['order_status'];
            $waitress = $row['waitress'];
        }
        else
        {
            header('location:'.SITEURL.'admin/adminorder.php');
        }
    }
    else
    {
        header('location:'.SITEURL.'admin/adminorder.php');
    }


  ?>

  <form action = "" method = "POST">

  <table class = "table">

      <tr> 
        <td> Order Status: </td>
        <td>
        <select name = "order_status">
            <option <?php if($status=="Ordered"){echo "selected";} ?> value = "Ordered">Ordered</option>
            <option <?php if($status=="Processing"){echo "selected";} ?> value = "Processing">Processing</option>
            <option <?php if($status=="On Delivery"){echo "selected";} ?>  value = "On Delivery">On Delivery</option>
            <option <?php if($status=="Cancelled"){echo "selected";} ?>  value = "Cancelled">Cancelled</option>
        </select>
    </td>
    </tr>

    <tr>
        <td> Waitress </td>
        <td>
        <select name = "waitress">
            <option <?php if($waitress=="James"){echo "selected";} ?>  value = "James">James</option>
            <option <?php if($waitress=="John"){echo "selected";} ?> value = "John">John</option>
            <option <?php if($waitress=="Sam"){echo "selected";} ?> value = "Sam">Sam</option>
            <option <?php if($waitress=="Michael"){echo "selected";} ?> value = "Michael">Michael</option>
        </select>
    </td>
    </tr>
    <td>

    <input type = "hidden" name = "id" value ="<?php echo $id; ?>">  
    <input type = "submit" name = "submit" value ="Update Order" class = "btn-secondary">      
    </td>

</table>
</form>

<?php

// When submitted 
    if(isset($_POST['submit']))
    {
       $id = $_POST['id'];
       $status = $_POST['order_status'];
       $waitress = $_POST['waitress'];

       $sql1 = "UPDATE tbl_order SET
       order_status = '$status' ,
       waitress = '$waitress'
       WHERE id = $id
       ";

       $result1 = mysqli_query($conn, $sql1);

       if($result1==true)
       {

        $_SESSION['order_update'] = "<div class = 'success' >Order has been updated successfully.</div>";
        header('location:'.SITEURL.'admin/adminorder.php');
       }
       else
       {
        $_SESSION['order_update'] = "<div class = 'failed' >Order Failed to Update .</div>";
        header('location:'.SITEURL.'admin/adminorder.php');
       }
    }


?>

</div>
</div>

<!--- Main ends here -->

<?php include('fixed/footer.php'); ?>