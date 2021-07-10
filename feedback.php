
<?php include('fixed - front/menu.php'); ?> 


            <img src = "Images/feeback.PNG" class ="img-responsive">

<div class = "container1">
        <form action = "#" METHOD = "POST" class ="register">
            <h2 class = "text-center text-color"> <b> Feedback</b></h2>      
        <div class = "design">
            <h4 class = "text-color"> <b> Please provide us your feedback</h4> </b> <br>
        <div class = "order-label"> Subject: </div>
        <input type="textarea" name ="full_name" placeholder="E.g. Sarah John" class = "input-responsive" required>


        <div class = "order-label"> Select: </div>

        <select name = "feeback_option">
            <option value = "Ordered">Food Categories</option>
            <option value = "Ordered">Food Menu</option>
            <option value = "Ordered">Order Delivery</option>
            <option value = "Ordered">Others</option>
            </select>
        <textarea name="description" cols="108" rows="5" placeholder = "Food Description"> </textarea>

            <br> <br> <br> 
        <input type = "submit" name = "submit" value = "submit" class = "btn btn-primary2">
        
    </div>
    </form>
</div>







<!-- Footer starts here-->

<?php include('fixed - front/footer.php'); ?>
        
<!-- Footer ends here-->