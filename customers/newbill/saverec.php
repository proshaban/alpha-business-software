<?php
include 'conc.php';
date_default_timezone_set('Asia/Kolkata');
if(!empty($_POST['cusid']) &&!empty($_POST['table']) && !empty($_POST['billno']) && !empty($_POST['total']) )
{
    $table = $_POST['table'];
    $cusid = $_POST['cusid'];
    $billno = $_POST['billno'];
    $total = $_POST['total'];
    $paid = $_POST['paid'];
    $dues = $total - $paid;
    $date  = $_POST['date'];
    $tempid= $_POST['cusNid'];
    $random = $_POST['random'];

    //update to eg. dest_22342342 list 

    $time = date("h:i A");

    //update customer transaction
    $transup = mysqli_query($conn,"UPDATE $cusid SET `date`='$date',`type`='Credit',`billno`='$billno',`total`='$total',`paid`='$paid',`dues`= '$dues', `time`='$time' , `transtable`='$table' WHERE `transtable`='$random'  ");

    //update to main distributer's list 
    $id = explode("_",$cusid);

    //update on customer list
    $destlistulp =  mysqli_query($conn, "UPDATE `customers` SET `total`= `total`+ '$total' ,`paid`= `paid` + '$paid' ,`dues` = `dues`+'$dues' ,`date`='$date' WHERE `id` = '$id[1]' ");


    //update this transaction on Daily Transactions

    mysqli_query($conn, "INSERT INTO `dailylist` (`type`, `date`, `time`, `amount`, `table`) VALUES ('Given','$date','$time','$total','$table')");

    

    if($transup && $destlistulp ){
        //update stocks $sqlpl = mysqli_query($conn, "UPDATE `productlist` SET `stock`=  `stock` + '$quantity' WHERE `name` = '$name' AND `model` = '$model' " );
        
            ?>
        <script>
            alert("ADDED SUCCESSFULLY");
            location.href="/customers/transactions.php?cusId=<?php echo $cusid?>";
        </script> <?php
        }
    else
    {
        ?>
    <script>
        alert("Connection Faild ");
        location.href="/customers/transactions.php?cusId=<?php echo $cusid?>";
    </script>

    <?php


    }

}
{
    ?>
    <script>
        alert("All Fields Are Mendatory ");
        location.href="/customers/transactions.php?cusId=<?php echo $cusid?>";
    </script>

    <?php
}
?>