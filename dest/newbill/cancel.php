<?php
include 'conc.php';

$table = $_POST['table'];
$destid = $_POST['destid'];
$tabletrans = $_POST['transtable'];
$drop = mysqli_query($conn, "DROP TABLE $table");
$delete = mysqli_query($conn, "DELETE FROM $destid where `transtable`= $tabletrans ");

if($drop && $delete) 
{
    ?>
    <script>
        location.href="/dest/transactions.php?destId=<?php echo $destid?>";
    </script>

    <?php
}
else
{
    ?>
    <script>
        alert("Failed to Cancel");
        location.href="/dest/transactions.php?destId=<?php echo $destid?>";
    </script>

    <?php
}
?>