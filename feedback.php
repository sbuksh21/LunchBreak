<?php 

include('fixed - front/menu.php'); 
      
?>


<div class = "container1"> 
<div style = "text-align: center"> <br>
        <span class = "emoji ">😍😁😶🙁🤬</span> </div> <br><br>

        <?php
                
                if(isset($_SESSION['feedback']))
                {
                    echo $_SESSION['feedback'];
                    unset($_SESSION['feedback']);
                }
    
            ?>

        <form action = "#" METHOD = "POST" class ="register">
            <h3 class = "text-center text-color"> <b> We Love to hear from you</b></h3>   
        <div class = "design3">
        <label><b> Subject: </b></label> <br> <br>
        <input type="textarea" name ="subject" placeholder="Enter a subject" class = "input-responsive" required><br>

        <label><b> Select Type: </b></label> <br> <br>
        <select name = "feedback">

            <option <?php {echo "selected";} ?> value = "Food Categories">Food Categories</option>
            <option <?php {echo "selected";} ?> value = "Food Menu">Food Menu</option>
            <option <?php {echo "selected";} ?> value = "Order Delivery">Order Delivery</option>
            <option <?php {echo "selected";} ?> value = "Others">Others</option>
            </select><br> <br>

        <textarea name="message" placeholder = "Message"> </textarea>

            <br> <br> <br> 
            
        <input type = "submit" name = "submit" value = "submit" class = "btn btn-primary2">
       
        <?php

                //To fetch the data of the login User to insert it in the order table when the User makes an order
                $user = $_SESSION["user"];
                $query = mysqli_query($conn,"SELECT * FROM tbl_user WHERE username = '$user'");
                $row=mysqli_fetch_array($query);
                $first_name = $row['full_name'];
                $mobile = $row['mobile_number'];
                $email = $row['email'];


            if(isset($_POST['submit']))
            {
            
                $subject = $_POST['subject'];
                $feedback = $_POST['feedback'];
                $message = $_POST['message'];

                $sql1 = "INSERT INTO tbl_feedback SET
                subject = '$subject' ,
                feedback = '$feedback' ,
                message ='$message' ,
                customer_name = '$first_name',
                customer_phone = $mobile ,
                customer_email = '$email' 
                ";
         

                $result1 = mysqli_query($conn, $sql1);
         
                if($result1==true)
                {
         
                 $_SESSION['feedback'] = "<div class = 'text-center success' >Thanks for your feedback.</div>";
                 header('location:'.SITEURL.'feedback.php');
                }
                else
                {
                 $_SESSION['feedback'] = "<div class = 'text-center failed' >Failed to send your feedback.</div>";
                 header('location:'.SITEURL.'feedback.php');
                }
             }
       
         
        ?>  
        

    </div>
    </form>
    <br> <br> 
</div>

<!-- Footer starts here-->

<?php include('fixed - front/footer.php'); ?>
        
<!-- Footer ends here-->