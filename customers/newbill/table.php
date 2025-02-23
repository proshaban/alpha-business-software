<?php
include 'conc.php';

//generate product list 

$tablename = $_POST['table'];


if(!empty($_POST['drop']))
{
    $id = $_POST['drop'];
    
    $userid = $_POST['userid'];

    $number = 100000+$id;
    $date = date('d-m-Y');

    //get product name and model number from current table , in order to delete form the productlist
    $dsql = mysqli_query($conn, "SELECT * FROM $tablename WHERE `id` = '$id' ");
    $drow = mysqli_fetch_assoc($dsql);

    $dname = $drow['name'];
    $dmodel = $drow['model'];
    $dquan = $drow['quantity'];


    //update product list 
    mysqli_query($conn , "UPDATE `productlist` SET `stock`=  `stock` + $dquan WHERE `name` = '$dname' AND `model` = '$dmodel' ");

    $protable = "PRO".$userid.$number;

    mysqli_query($conn, "DELETE FROM $tablename WHERE `id` = '$id' ");
   

    ?>
        <script>
            console.log("<?php echo $protable ?>");
        </script>
    <?php
}

$sql = mysqli_query($conn, "SELECT * FROM $tablename ORDER BY `id` DESC ");

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
                <strong>Quantity</strong>
            </th>
            <th>
                <strong>Rate</strong>
                
            </th>
           
            <th>
                <strong>Total</strong>
                
            </th>
            <th>
                <strong>Drop</strong>
            </th>
        </thead>
        <tbody>';

        $slno = 1;
        
        $total=0;
        $rows ="";
        while($row = mysqli_fetch_assoc($sql))
        {
            $rows .= '<tr>
            <td>'.$slno.'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['model'].'</td>
            <td align="right">'.$row['quantity'].'</td>
            <td align="right">'.$row['rateE'].'</td>
            <td align="right">'.$row['total'].'</td>
            <td align="center" onclick="$(\'#droproId\').val('.$row['id'].');" style="color:red; cursor: pointer;"><i class="fas fa-minus-circle"></i></td>
        </tr>';

            $slno++;
            $total= $total + $row['total'];
        }


        $lastrow = '</tbody>
        <input type="text" id="totalAmount" value="'.$total.'" hidden>
        <tfoot>
            <th colspan="5">Total </td>
            
            <th>'.$total.'</th>
            <input type="text" class="totalSum" value = " '.$total.' " hidden>
            <th></th>
            </tfoot>
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
    echo "NO TABLE FOUND";
}



?>