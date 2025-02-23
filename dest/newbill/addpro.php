<?php
include 'conc.php';
date_default_timezone_set('Asia/kolkata');
$date = date('d/m/Y');

if(!empty($_POST['name']) && !empty($_POST['model']) && !empty($_POST['table']) && !empty($_POST['MRP']) && !empty($_POST['quantity']) )
{
    $name = mysqli_real_escape_string($conn,  $_POST['name']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $table = $_POST['table'];
    $quantity = $_POST['quantity'];
    $rateE = $_POST['rateE'];
    $rate = $_POST['rate'];
    $cgst = $_POST['cgst'];
    $cgstp = $_POST['cgstp'];
    $sgst = $_POST['sgst'];
    $sgstp= $_POST['sgstp'];
    $mrp =  $_POST['MRP'];
    $total= $_POST['total'];
    $date = date("d/m/Y");
    $destid = $_POST['destid'];
    $proId = $_POST['proId'];
    
    $sql  = mysqli_query($conn, "INSERT INTO $table (`name`, `model`, `quantity`, `rateE`, `cgstp`, `cgst`, `sgstp`, `sgst`, `amount`, `mrp`, `total`,`date`, `proId`, `destid`) VALUES 
                                                   ('$name','$model','$quantity','$rateE','$cgstp','$cgst','$sgstp','$sgst','$rate','$mrp','$total','$date','$proId', '$destid' )");

    $proin = mysqli_query($conn ,"SELECT * FROM `productlist` WHERE `name` = '$name' AND `model` = '$model' AND `id` = '$proId' ");
    $row = mysqli_fetch_assoc($proin);

    $proinfo = $row['proinfo'];

    mysqli_query($conn, "INSERT INTO $proinfo (`date`, `price`, `stock`, `dest`) VALUES ('$date','$rate','$quantity','$destid')");


    if($sql)
    {
        
        echo "success";
    }
    else{
        echo "112";
    }
}
else
{
    echo "111";
}


?>