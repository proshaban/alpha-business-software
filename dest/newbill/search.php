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
        echo '<li style="color:grey; text-align:center;">No Product Found</li>
              <li onclick="$(\'.AddProduct\').show();$(\'#searchinput\').val(\'\')" style="border-bottom:none; color:green;"> <i class="fas fa-plus-square"></i> Add New Product </li>
        ';
    }
   
}
else
{
    echo  "<li>NO TABLE FOUND</li>";
}



?>