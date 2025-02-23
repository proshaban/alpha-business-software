<?php
session_start();
include 'conc.php';

if(!empty($_POST['name']) && !empty($_POST['model']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $model =  mysqli_real_escape_string($conn, $_POST['model']);
    $stock =   mysqli_real_escape_string( $conn, $_POST['stock']);
    $Bprice =   mysqli_real_escape_string($conn ,$_POST['Bprice']);
    $MRP =   mysqli_real_escape_string($conn, $_POST['MRP']);
    $addon = date("Y-m-d");
    $userid = $_POST['userid'];


    $random = rand(10,9999999);

    $sql  = mysqli_query($conn, "INSERT INTO `productlist`(`name`, `model`, `stock`, `Bprice`, `MRP`, `addon` , `proinfo`) VALUES ('$name','$model','$stock','$Bprice','$MRP','$addon', '$random')");

    $getid = mysqli_query($conn, "SELECT * FROM `productlist` WHERE `proinfo` = '$random' ");

    $datas = mysqli_fetch_assoc($getid);

    $proid = $datas['id'];
    
    $number = 100000+$proid;
    //newtable = "PRO"+userid+100012

    $newtable= "PRO".$userid.$number;


    mysqli_query($conn, "UPDATE `productlist` SET `proinfo`= '$newtable' WHERE `id` = '$proid' ");


    mysqli_query($conn, "CREATE TABLE $newtable(
    
        id int(5) NOT NULL AUTO_INCREMENT , 
        date varchar(15) NOT NULL DEFAULT '0',
        price varchar(15) NOT NULL DEFAULT '0',
        stock int(5) NOT NULL DEFAULT '0',
        dest varchar(40),
        PRIMARY KEY(id)
    )");



    if($sql)
    {
        ?>
        <script>
            location.href="products.php";

        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert("cannot added to database");
            location.href="products.php";

        </script>
        <?php
    }
}
else
{
    ?>
        <script>
            alert("All Fields Are Mendatory");
            location.href="products.php";

        </script>
        <?php
}


?>