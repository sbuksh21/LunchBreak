
<?php include('fixed/menu.php'); ?>

<!--- Main starts here -->

<div class = "main-content">
<div class = "wrapper">
    <h2> Dashboard</h2>
    <br> <br>

    <?php

        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
    ?>

     <br> <br>
    <div class = "col-4 text-center">
    <h2>5</h2>
    <br>
    Categories
</div>

<div class = "col-4 text-center">
    <h2>5</h2>
    <br>
    Categories
</div>

<div class = "col-4 text-center">
    <h2>5</h2>
    <br>
    Categories
</div>

<div class = "col-4 text-center">
    <h2>5</h2>
    <br>
    Categories
</div>

<div class = "clearfix"></div>

    </div>
    </div>
<!--- Main ends here -->

<?php include('fixed/footer.php') ?>
