<?php
include 'conc.php';
$table = $_POST['table'];
$total = $_POST['total'];
$paid = $_POST['paid'];
$dues = $_POST['dues'];


$date =$_POST['date'];
//change date format 

//$datefor = explode("/", $_POST['date']);

//$date = $datefor[2]."-".$datefor[1]."-".$datefor[0];

$id= explode("_",$table);


//create new transaction 
$destdupdate = mysqli_query($conn, "INSERT INTO $table (`date`, `type`, `billno`, `total`, `paid`, `dues` ) VALUES 
                                                        ('$date','PAYMENT','---','0','$paid','0'-'$paid')");

//update time on distributer list 
$maindest = mysqli_query($conn, "UPDATE `destributers` SET `date` = '$date' WHERE `id` = '$id[1]' ");



if($destdupdate && $maindest)
{
    ?>
    <script>
        alert("Successfull ");
        location.href = "/dest/transactions.php?destId=<?php echo $table?>";
    </script>

<?php
}
else
{
    ?>
    <script>
        alert("Successfull ");
        location.href = "/dest/transactions.php?destId=<?php echo $table ?>";
    </script>

<?php
}

?>