<?php
include 'conc.php';
$search = '%'.$_POST['search'].'%';
//generate product list 
$sql = mysqli_query($conn, "SELECT * FROM `destributers` WHERE `name` LIKE '$search' OR `gst` LIKE '$search' ");

if($sql)
{
    if(mysqli_num_rows($sql)>0)
    {

        $rows ="";
        while($row = mysqli_fetch_assoc($sql))
        {
            $rows .= '<li
            onclick="location.href=\'transactions.php?destId=dest-'.$row['id'] .'\'">'.$row['gst'].' || '.$row['name'].' </li>';
        
        }

        echo $rows;
    }
    else
    {
        echo "<li>No Destributers Found Found</li>";
    }
   
}
else
{
    echo  "<li>Unable To Connect The Database</li>";
}



?>