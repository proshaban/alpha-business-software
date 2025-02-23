<?php
include 'conc.php';

if(!empty($_POST['proId']) && !empty($_POST['proName']) && !empty($_POST['proModel']))
{
    $name = mysqli_real_escape_string($conn, $_POST['proName']);
    $model = mysqli_real_escape_string($conn, $_POST['proModel']);
    $stock = mysqli_real_escape_string($conn, $_POST['proStock']);
    $Bprice = mysqli_real_escape_string($conn, $_POST['proBprice']);
    $MRP = mysqli_real_escape_string($conn, $_POST['proMRP']);
    $id = mysqli_real_escape_string($conn, $_POST['proId']);

    $sql  = mysqli_query($conn, "UPDATE `productlist` SET `name`='$name',`model`='$model',`stock`='$stock',`Bprice`='$Bprice',`MRP`='$MRP' WHERE `id` = '$id' ");
    if($sql)
    {
        ?>
        <script>
            location.href="products.php";

        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert("cannot edit to database");
            location.href="products.php";

        </script>
        <?php
    }
}
else
{
    ?>
        <script>
            alert("All Fields Are Mendatory");
            location.href="products.php";

        </script>
        <?php
}


?>