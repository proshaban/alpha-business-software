<?php 
include 'conc.php';

if(!empty($_POST['name']) && !empty($_POST['mobile1']))
{
    $name = $_POST['name'];
    $mobile1 = $_POST['mobile1'];
    $mobile2 = $_POST['mobile2'];
    $email= $_POST['email'];
    
    $sqls = mysqli_query($conn, "SELECT * FROM `customers` WHERE `mobile1`= '$mobile1' ");
    if(mysqli_num_rows($sqls)>0)
    {
        ?>
            <script>
            alert("!! Customer Already Exists !!");
            location.href="customers.php";
            </script>
        <?php
    }
    else
    {
        // add destributer to table 
        $sql = mysqli_query($conn, "INSERT INTO `customers`(`name`, `mobile1`, `mobile2`, `email` , `dues` , `total` , `paid` , `date` ) VALUES ('$name','$mobile1','$mobile2','$email', '0','0','0','0')");


        //get destributer id
        $sqldest = mysqli_query($conn, "SELECT `id` FROM `customers` WHERE `name` = '$name' AND `mobile1` = '$mobile1' ");

        //crate a table with destributer id Eg. dest2323
        $row = mysqli_fetch_assoc($sqldest);

        $destrecord = 'CUS_'.$row['id']; 

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
            location.href="customers.php";
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                alert("Cann't Add Customer ");
                location.href="customers.php";
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
        location.href="customers.php";
    </script>


    <?php
}


?>