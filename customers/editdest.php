<?php
include 'conc.php';
$table = $_POST['table'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$gst = $_POST['gst'];

$id= explode("_",$table);

$sql = mysqli_query($conn, "SELECT * FROM `destributers` WHERE `gst` = '$gst' ");

if(mysqli_num_rows($sql)>0) 
{
    ?>
    <script>
        alert("This GST number is already registered");
        location.href = "/dest/transactions.php?destId=<?php echo $table?>";
    </script>

<?php
}
else
{



$maindest = mysqli_query($conn, "UPDATE `destributers` SET `mobile` = '$mobile' ,`email`= '$email' , `gst`= '$gst' WHERE `id` = '$id[1]' ");

if($maindest)
{
    echo "success";
}
else
{
    echo "Error Occured";
}

}
?>