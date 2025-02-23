<?php
include 'conc.php';

if(!empty($_POST['name']) && !empty($_POST['model']) && !empty($_POST['table']) && !empty($_POST['Sprice']) && !empty($_POST['quantity']) )
{
    $name = mysqli_real_escape_string($conn,  $_POST['name']);
    $model =mysqli_real_escape_string($conn,  $_POST['model']);
    $table = mysqli_real_escape_string($conn, $_POST['table']);
    $Sprice = $_POST['Sprice'];
    $quantity = $_POST['quantity'];
    $totalA = $quantity * $Sprice ;
    $instocks = $_POST['instocks'];

    if($quantity>$instocks)
    {
        echo "401";
    }
    else
{

    $sql  = mysqli_query($conn, "INSERT INTO $table (`name`, `model`, `quantity`, `Sprice`, `amount`) VALUES ('$name','$model','$quantity','$Sprice','$totalA') ");

    $sqlpl = mysqli_query($conn, "UPDATE `productlist` SET `stock`=  `stock` - '$quantity' WHERE `name` = '$name' AND `model` = '$model' " );
    if($sql && $sqlpl)
    {
        echo "Product Added Successfully";
    }
    else
    {

        echo "cannot added to database";
    }
}
}
else
{
    echo "All Fields Are Mendatory";
}


?>