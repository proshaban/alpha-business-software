<?php
include 'conc.php';

//generate product list 

$table = $_POST['table'];


if(!empty($_POST['drop']))
{
    $drop = $_POST['drop'];
    $dname = $_POST['name'];
    $dmodel = $_POST['model'];
    $quan = $_POST['quantity'];
    mysqli_query($conn, "UPDATE `productlist` SET `stock`= `stock`+ '$quan' WHERE `name`= '$dname' AND `model` = '$dmodel' ");
    mysqli_query($conn, "DELETE FROM $table WHERE `id` = $drop ");
}
else
{

$sql = mysqli_query($conn, "SELECT * FROM $table ");

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
                            <strong>Price</strong>
                        </th>
                        <th>
                            <strong>Total Amount</strong>
                            <article>(IOT)</article>
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
            <td align="right">'.$row['Sprice'].'</td>
            <td align="right">'.$row['amount'].'</td>
            <td align="center" onclick="$(\'#dropId\').val('.$row['id'].');$(\'#dropName\').val(\''.$row['name'].'\');$(\'#dropModel\').val(\''.$row['model'].'\'); $(\'#dropQuantity\').val('.$row['quantity'].'); " style="color:red; cursor: pointer;"><i class="fas fa-minus-circle"></i></td>
            </tr>';

            $slno++;
            $total= $total + $row['amount'];
        }


        $lastrow = '</tbody>
                    <tfoot>
                        <th colspan="5">Total </td>
                        
                        <th colspan="2">'.$total .'</th>
                        <script>
                        $("#totalAmt").val('.$total .');
                        </script>
                        
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

}

?>