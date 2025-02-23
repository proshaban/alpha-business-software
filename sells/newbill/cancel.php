<?php
include 'conc.php';

$table= $_POST['table'];

$stock = "UPDATE
productlist pl , $table t
SET
pl.stock = pl.stock + t.quantity
WHERE
pl.name = t.name 
AND 
pl.model = pl.model";

$sqla = mysqli_query($conn,$stock);

$sqdt = mysqli_query($conn, "DROP TABLE $table ");

if($sqdt && $sqla)
{
    ?>
    <script>
        alert("Record Canceled Successfully ");
        location.href='/sells/sells.php';
    </script>

    <?php
}
else
{
    ?>
    <script>
        alert("Unable To Cancel this Record || Contact Developer ");
        location.href='/sells/sells.php';
    </script>

    <?php
}



?>