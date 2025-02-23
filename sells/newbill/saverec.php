<?php
include 'conc.php';
date_default_timezone_set("Asia/Kolkata");
$date1 = date("Y-m-d");
$time = date("h:i A");
$random = rand(1000,9999);




$table= $_POST['table'];
$total = $_POST['total'];

//sqld addnew row to dailylist 
$status = "Taken";
$sqdl = mysqli_query($conn,"INSERT INTO `dailylist` (`type`, `date`, `time`, `amount`, `table`) VALUES ('$status','$date1','$time','$total' , '$table')");

$sqla = mysqli_query($conn, "UPDATE `$table` SET `time`='$time',`date`='$date1'");

//drop temp file
//$sqdt = mysqli_query($conn, "DROP TABLE $table ");

if($sqdl && $sqla)
{
    $t_link = "/sells/roughbill.php?table=".$table;

    ?>
    <script>
        alert("saved");
        location.href="<?php echo $t_link ?>" ;
    </script>

    <?php
}
else
{
    ?>
    <script>
        alert("Data not saved");
        location.href='/sells/sells.php';
    </script>

    <?php
}



?>