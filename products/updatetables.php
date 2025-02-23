<?php
include 'conc.php';
date_default_timezone_set('Asia/Kolkata');


$sql = mysqli_query($conn, "SELECT * FROM `productlist` ");

if($sql)
{

    while($data = mysqli_fetch_assoc($sql))
    {
        $id = $data['id'];

        $number = 100000+$id;
        $tablename = "PRO1002".$number;

        $sqlu = mysqli_query($conn, "UPDATE `productlist` SET `proinfo` ='$tablename' WHERE `id` = '$id' ");
        
        $sqla = mysqli_query($conn, "CREATE TABLE $tablename(
    
            id int(5) NOT NULL AUTO_INCREMENT , 
            date varchar(15) NOT NULL DEFAULT '0',
            price varchar(15) NOT NULL DEFAULT '0',
            stock int(5) NOT NULL DEFAULT '0',
            dest varchar(40),
            PRIMARY KEY(id)
        )");

        if($sqla && $sqlu)
        {
            echo "SuCESS";
        }
        else
        {
            echo "didn\'t worked ";
        }
    }

    echo "success";

}
else
{
    echo "connection faild";
}


?>