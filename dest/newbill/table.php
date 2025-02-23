<?php
include 'conc.php';

//generate product list 

$tablename = $_POST['table'];


if(!empty($_POST['drop']))
{
    $id = $_POST['drop'];
    $dname = $_POST['name'];
    $dmodel = $_POST['model'];
    $quan = $_POST['quantity'];
    $userid = $_POST['userid'];
    $proId = $_POST['proId'];
    $destid = $_POST['destid'];
    $number = 100000+$proId;
    $date = date('d/m/Y');
    
    $protable = "PRO".$userid.$number;

    mysqli_query($conn, "DELETE FROM $tablename WHERE `id` = '$id' ");
    mysqli_query($conn, "DELETE FROM $protable WHERE `date` = '$date' AND `dest` = '$destid' ");
    

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
           
            <th colspan="2">
                <strong>CGST</strong>
            </th>
            <th colspan="2">
                <strong>SGST</strong>
            </th>
            <th>
                <strong>Net Rate</strong>
            </th>
            <th>
                <strong>MRP</strong>
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
            <td align="right">'.$row['cgstp'].'</td>
            <td align="right">'.$row['cgst'].'</td>
            <td align="right">'.$row['sgstp'].'</td>
            <td align="right">'.$row['sgst'].'</td>
            <td align="right">'.$row['amount'].'</td>
            <td align="right">'.$row['mrp'].'</td>
            <td align="right">'.$row['total'].'</td>
            <td align="center" onclick="$(\'#dropId\').val('.$row['id'].'); $(\'#proId\').val('.$row['proId'].'); " style="color:red; cursor: pointer;"><i class="fas fa-minus-circle"></i></td>
        </tr>';

            $slno++;
            $total= $total + $row['total'];
        }


        $lastrow = '</tbody>
        <input type="text" id="totalAmount" value="'.$total.'" hidden>
        <tfoot>
            <th colspan="11">Total </td>
            
            <th>'.$total.'</th>
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