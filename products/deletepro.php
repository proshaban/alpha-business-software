<?php
include 'conc.php';

if(!empty($_POST['proId']))
{

    $id = $_POST['proId'];

    //$sql  = mysqli_query($conn, "DELETE FROM `productlist` WHERE `id`= '$id' ");

    $data = mysqli_query($conn, "SELECT * FROM `productlist` WHERE `id`= '$id' ");


    if($data)
    {
        $datas = mysqli_fetch_assoc($data);

        $proinfo = $datas['proinfo'];

        $dtable =  mysqli_query($conn, "DROP TABLE $proinfo ");

        $dpro = mysqli_query($conn, "DELETE FROM `productlist` WHERE `id`= '$id' ");

        if($dtable && $dpro)
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
                alert("cannot `DELETE` and DROP `table` ");
                location.href="products.php";
    
            </script>
            <?php
        }
        
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