<?php
include 'conc.php';
$search = '%'.$_POST['search'].'%';
//generate product list 
$sql = mysqli_query($conn, "SELECT * FROM `productlist` WHERE `name` LIKE '$search' OR `model` LIKE '$search' ");

if($sql)
{
    if(mysqli_num_rows($sql)>0)
    {

        $rows ="";
        while($row = mysqli_fetch_assoc($sql))
        {

            $rows .= '<li onclick="$(\'#editId\').val('.$row['id'].');$(\'.editform\').submit(); $(\'#searchinput\').val(\'\')"> '.$row['model'] .' || '.$row['name'].' </li>';
        
        }

        echo $rows;
    }
    else
    {
        echo "<li>No Product Found</li>";
    }
   
}
else
{
    echo  "<li>NO TABLE FOUND</li>";
}



?>