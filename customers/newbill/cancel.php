<?php
include 'conc.php';

$table = $_POST['table'];
$cusid = $_POST['cusid'];
$tabletrans = $_POST['transtable'];

$stock = "UPDATE
productlist pl , $table t
SET
pl.stock = pl.stock + t.quantity
WHERE
pl.name = t.name 
AND 
pl.model = pl.model";


mysqli_query($conn, "$stock");





$drop = mysqli_query($conn, "DROP TABLE $table");
$delete = mysqli_query($conn, "DELETE FROM $cusid where `transtable`= $tabletrans ");




if($drop && $delete) 
{
    ?>
    <script>
        location.href="/customers/transactions.php?cusId=<?php echo $cusid?>";
    </script>

    <?php
}
else
{
    ?>
    <script>
        alert("Failed to Cancel");
        location.href="/customers/transactions.php?cusId=<?php echo $cusid?>";
    </script>

    <?php
}
?>