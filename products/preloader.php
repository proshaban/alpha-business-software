<?php
include 'conc.php';

$sortby = $_POST['sortby'];

if($sortby === "1")
{
    $sql = mysqli_query($conn, "SELECT * FROM `productlist` ORDER BY `id` ");
}
else if($sortby === "2")
{
    $sql = mysqli_query($conn, "SELECT * FROM `productlist` ORDER BY `stock` ");
}
else
{
    $sql = mysqli_query($conn, "SELECT * FROM `productlist` ORDER BY `MRP` ");
}
//generate product list 


if($sql)
{
    if(mysqli_num_rows($sql)>0)
    {

        $firstrow = '<table>
        <thead>

            <th>
                <strong> Sl.No</strong>
            </th>
            <th>
                <strong>Name Of Product </strong>
            </th>
            <th>
                <strong>Model No.</strong>
            </th>
            <th>
                <strong>Stock</strong>
            </th>
            <th>
                <strong>MRP</strong>
                
            </th>
            <th>
                <strong>Last Add On</strong>
            </th>
            <th>Edit</th>
            
        </thead>
        <tbody>';

        $slno = 1;
        $rows ="";
        while($row = mysqli_fetch_assoc($sql))
        {
            $date = explode("-", $row['addon'] );

            $datef = $date[2].'/'.$date[1].'/'.$date[0];
            $rows .= '<tr id="'.$row['id'].'" onclick="location.href=\'prodetails.php?id='.$row['proinfo'].'\';">
            <td>' .$slno .'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['model'].'</td>
            <td>'.$row['stock'].'</td>
            
            <td>'.$row['MRP'].'</td>
            <td>'.$datef.'</td>
            <td align="center" onclick="$(\'#editId\').val('.$row['id'].');$(\'.editform\').submit();" style="color:green; cursor: pointer;"><i class="fas fa-edit"></i></td>
           
        </tr>';
        $slno++;
        }


        $lastrow = '</tbody>
        </table>';

        echo $firstrow.$rows.$lastrow;
    }
    else
    {
        echo "No Product Found";
    }
   
}
else
{
    echo "Connection Faild";
}



?>