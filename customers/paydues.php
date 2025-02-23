<?php
include 'conc.php';
$table = $_POST['table'];
$total = $_POST['total'];
$paid = $_POST['paid'];
$dues = $_POST['dues'];
$date = $_POST['date'];

$id= explode("_",$table);

$destdupdate = mysqli_query($conn, "INSERT INTO $table (`date`, `type`, `billno`, `total`, `paid`, `dues` ) VALUES 
                                                        ('$date','PAYMENT','---','0','$paid','0'-'$paid')");

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