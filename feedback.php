
<?php include('fixed - front/menu.php'); ?> 



<div class = "container1">

        <form action = "#" METHOD = "POST" class ="register">
            <h3 class = "text-center text-color"> <b> We Love to hear from you</b></h3>   
        <div class = "design">
        <span class = "emoji">😍😁😶🙁🤬</span> </b> <br> <br> 
        <div class = "order-label"> Subject: </div>
        <input type="textarea" name ="subject" placeholder="Enter a subject" class = "input-responsive" required>

        <div class = "order-label"> Select: </div>

        <select name = "feeback_option">
            <option value = "Ordered">Food Categories</option>
            <option value = "Ordered">Food Menu</option>
            <option value = "Ordered">Order Delivery</option>
            <option value = "Ordered">Others</option>
            </select>
        <textarea name="description" cols="108" rows="5" placeholder = "Message"> </textarea>

            <br> <br> <br> 
        <input type = "submit" name = "submit" value = "submit" class = "btn btn-primary2">
       
    </div>
    </form>
    <br> <br> 
</div>



<!-- Footer starts here-->

<?php include('fixed - front/footer.php'); ?>
        
<!-- Footer ends here-->