<?php
include 'conc.php';
date_default_timezone_set('Asia/Kolkata');
if(!empty($_POST['destid']) &&!empty($_POST['table']) && !empty($_POST['billno']) && !empty($_POST['total']) )
{
    $table = $_POST['table'];
    $destid = $_POST['destid'];
    $billno = $_POST['billno'];
    $total = $_POST['total'];
    $paid = $_POST['paid'];
    $dues = $_POST['dues'];
    $date  = $_POST['date'];
    $desttid= $_POST['destTid'];

    //update to eg. dest_22342342 list 

    $time = date("h:i A");

    $transup = mysqli_query($conn,"UPDATE $destid SET `date`='$date',`type`='Stock Entry ',`billno`='$billno',`total`='$total',`paid`='$paid',`dues`='$dues',`transtable`='$table' , `time` = '$time' WHERE `id`= '$desttid' ");


    //update to main distributer's list 
    $id = explode("_",$destid);
    
    $destlistulp =  mysqli_query($conn, "UPDATE `destributers` SET `total`= `total`+ '$total' ,`paid`= `paid` + '$paid' ,`dues` = `dues`+'$dues' ,`date`='$date' WHERE `id` = '$id[1]' ");

    
    if($transup && $destlistulp ){
        //update stocks $sqlpl = mysqli_query($conn, "UPDATE `productlist` SET `stock`=  `stock` + '$quantity' WHERE `name` = '$name' AND `model` = '$model' " );
        $stockup = mysqli_query($conn,"UPDATE
        productlist pl , $table t
        SET
        pl.stock = pl.stock + t.quantity ,
        pl.addon = '$date' ,
        pl.MRP = t.mrp ,
        pl.Bprice = t.amount
        WHERE
        pl.name = t.name 
        AND 
        pl.model = pl.model");

        if($stockup)
        {
            ?>
        <script>
            alert("Successfull ");
            location.href = "/dest/transactions.php?destId=<?php echo $destid?>";
        </script>

    <?php
        }
        else
        {
            ?>
        <script>
            alert("Cannot Update Product Stock ");
            location.href = "/dest/transactions.php?destId=<?php echo $destid?>";
        </script>

    <?php
        }
    }
    else
    {
        ?>
    <script>
        alert("Connection Faild ");
        location.href = "/dest/transactions.php?destId=<?php echo $destid?>";
    </script>

    <?php
    }

}
else
{
    ?>
    <script>
        alert("All fileds Are required ");
        location.href = "/dest/transactions.php?destId=<?php echo $destid?>";
    </script>

    <?php
}


?>