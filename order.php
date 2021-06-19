<?php include('fixed-front/menu.php'); ?>
    
    <!--Food Ordering starts here -->
    <section class = "food-order">
    <div class = "container">
    <h1 class = "text-center text-grey"> Fill the form to place your order</h1>

    <form action = "#" class = "order">
        <fieldset>
            <legend> <b> Ordered Food </legend> </b>
            <div class = "food-menu-img">
                <img src = "images/Rice.jpg" alt= "Chicken Teriyaki Rice" class = "img-responsive img-curve">
            </div>
            <div class = "food-desc">
                <h3> Food Name</h3>
                <p class = "food-price"> $5</p>

                <div class = "order-label"> Quantity </div>
                <input type = "number" name = "qty" class = "input-responsive" value="1" required>
            </div>
        </fieldset>

        <fieldset>
            <legend> <b> Delivery Details</legend> </b>
            <div class = "order-label"> Full Name: </div>
            <input type="text" name ="full-name" placeholder="E.g. Sarah John" class = "input-responsive" required>

            <div class = "order-label"> Mobile Number: </div>
            <input type="tel" name ="contact" placeholder="E.g. 97455xxxxx" class = "input-responsive" required>

            <div class = "order-label"> Email: </div>
            <input type="email" name ="email" placeholder="E.g. xxx@gmial.com" class = "input-responsive" required>

            <div class = "order-label"> Department: </div>
            <textarea name ="department" rows = "2" class = "input-responsive" required> </textarea>

            <div class = "order-label"> Floor Number: </div>
            <textarea name ="floor" rows = "2" class = "input-responsive" required> </textarea>

            <div class = "order-label"> Payment: </div>
            <select name = "select">
                    <option value = "" row = "2">Select</option>
                    <option value = "Cash on Delivery" >Cash on Delivery</option>
            </select>
            <br> <br> <br>

            <input type = "submit" name = "submit" value = "Confirm Order" class = "btn btn-primary2">

        </fieldset>
    </form>
</div>
</section>

     <!--Food Ordering ends here -->

<!-- Footer starts here-->
<section class = "Footer">
    <div class = "container">
              
        <p>Copyright <img src="https://img.icons8.com/emoji/15/000000/copyright-emoji.png"/> 2021 LunchBreak.net. All rights reserved. <a href = "#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a> <a href = "#"><img src="https://img.icons8.com/fluent/48/000000/snapchat.png"/></a> <a href = "#"><img src="https://img.icons8.com/color/48/000000/facebook-circled--v4.png"/></a></p>    

        </div>
        </section>
<!-- Footer ends here-->
</body>
</html>