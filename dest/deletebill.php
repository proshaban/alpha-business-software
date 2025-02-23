<?php
include 'conc.php';

$usid = $_POST['userid'];
$pass  = $_POST['pass'];
$billid = $_POST['billid'];

if(isset($billid))
{
    $cred = mysqli_query($conn, "SELECT * FROM `usercred` WHERE `id`= '$usid' AND `pass` = '$pass' ");

    if(mysqli_num_rows($cred)>0)
    {

    
        $destid = 'dest_'.$billid[2].$billid[3].$billid[4].$billid[5].$billid[6].$billid[7].$billid[8];

        //update stocks by deleting items 
        $stockup = mysqli_query($conn,"UPDATE
        productlist pl , $billid t
        SET
        pl.stock = pl.stock - t.quantity
        WHERE
        pl.name = t.name 
        AND 
        pl.model = pl.model");

        $sql1 = mysqli_query($conn,"DROP TABLE $billid");
        $sql2 = mysqli_query($conn, "DELETE FROM $destid WHERE `transtable` = '$billid' ");

        if($sql1 && $sql2 && $stockup)
        {
            ?>
            <script>
                alert("Task Done Successfully ");
                location.href="/dest/destributers.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Task Faild ");
                location.href="/dest/destributers.php";
            </script>
            <?php

        }

    }
        else
    {
        ?>
            <script>
                alert("Password Not Matched");
                location.href="/dest/destributers.php";
            </script>
        <?php
    }
}

?>