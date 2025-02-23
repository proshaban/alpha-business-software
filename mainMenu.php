<?php
if(!isset($_COOKIE['usid']))
{
    ?>

    <script>
        alert("!Login Session Expired!");
        location.href="/index.php";
    </script>
<?php

}

?>


<!DOCTYPE html>

<head>
    <title>Records || Alpha Business</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

</head>

<body>
    <div class="container">
        <header>
            <img src="Logo.png" alt="Logo HERE" width="80" height="80"> 
            <div class="title">
                <h1>Smart Business Software</h1>
                <p>By Shaban Khan</p>
            </div>
            <div class="pagetitle">
                <p><i class="fas fa-align-justify"></i> MAIN MENU </p>
            </div>
        </header>
        <section class="data">
            <div class="menuOptions">
                <a href="/dest/destributers.php">Distributers</a>
                <a href="/customers/customers.php">Customers</a>
                <a href="/sells/sells.php">Sales</a>
                <a href="/products/products.php">Products</a>
                <a href="">Setting</a>
                <a href="logout.php">Logout</a>
            </div>
           
        </section>
    </div>

    <script src="newRecords.js"></script>
</body>