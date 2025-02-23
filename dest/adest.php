<?php 
include 'conc.php';

if(!empty($_POST['name']) && !empty($_POST['mobile']) && !empty($_POST['greg']))
{
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $gst = $_POST['greg'];
    $email= $_POST['email'];
    $today = date("Y-m-d");
    $sqls = mysqli_query($conn, "SELECT * FROM `destributers` WHERE `gst`= '$gst'  ");
    if(mysqli_num_rows($sqls)>0)
    {
        ?>
            <script>
            alert("!! Destributer Already Exists !!");
            location.href="destributers.php";
            </script>
        <?php
    }
    else
    {
        // add destributer to table 
        $sql = mysqli_query($conn, "INSERT INTO `destributers`(`name`, `mobile`, `email`, `gst`, `date` ) VALUES ('$name','$mobile','$email','$gst' , '$today') ");


        //get destributer id
        $sqldest = mysqli_query($conn, "SELECT `id` FROM `destributers` WHERE `name` = '$name' AND `gst` = '$gst' ");

        //crate a table with destributer id Eg. dest2323
        $row = mysqli_fetch_assoc($sqldest);

        $destrecord = 'dest_'.$row['id']; 

        mysqli_query($conn, "CREATE TABLE $destrecord(
    
            id int(5) NOT NULL AUTO_INCREMENT , 
            date varchar(15) NOT NULL DEFAULT '0',
            type varchar(15) NOT NULL DEFAULT '0',
            billno varchar(20) NOT NULL DEFAULT '0',
            total int(5) NOT NULL DEFAULT '0',
            paid int(5) NOT NULL DEFAULT '0',
            dues int(5) NOT NULL DEFAULT '0',
            transtable varchar(15) NOT NULL DEFAULT '0',
            time varchar(15) NOT NULL DEFAULT '0',
            PRIMARY KEY(id)
        )");
        

        if($sql)
        {
            ?>
            <script>
            location.href="destributers.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Cann't Add Destributer ");
                location.href="destributers.php";
            </script>
    
    
            <?php
        }
    }
}
else
{
    ?>
    <script>
        alert("Please Fill The Required Feilds");
        location.href="destributers.php";
    </script>


    <?php
}


?>