<?php include('fixed/menu.php'); ?>

<!--- Main starts here -->

<div class = "main-content">
<div class = "wrapper">
    <h2> Update Category</h2>

<br> <br>

<form action ="" method = "POST" enctype = "multipart/form-data">  

<table class = "table">
    <tr>
        <td>Food Name:</td>
        <td>
            <input type ="text" name = "food_name" placeholder = "Food Title">
        </td>
    </tr>

    <tr>
        <td>Food Description:</td>
        <td>
            <textarea name = "desc" cols = "28" rows = "6" placeholder = "Food Description"> </textarea>
        </td>
    </tr>

    <tr>
        <td> Price: </td>
        <td> <input type = "number" name = "price">    
        </td>
    </tr>

</table>
</form>








</div>
</div>  
<?php include('fixed/footer.php') ?>