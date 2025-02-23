<?php
include 'conc.php';

if(isset($_GET['billid']))
{
    $billid = $_GET['billid'];

    $destid = $billid[2].$billid[3].$billid[4].$billid[5].$billid[6].$billid[7].$billid[8];

    $dest = mysqli_query($conn, "SELECT * FROM `destributers` WHERE `id` = '$destid' ");


    if($dest)
    {
        $row = mysqli_fetch_assoc($dest);

        $name = $row['name'];
        $email = $row['email'];
        $phone =$row['mobile'];
        $gst = $row['gst'];

        

        $destable = "dest_".$destid;
        $deslist = mysqli_query($conn, "SELECT * FROM $destable WHERE `transtable` = '$billid' ");

        $destdata = mysqli_fetch_assoc($deslist);
        $billno = $destdata['billno'];
        $time = $destdata['time'];
        $dater = explode('-',$destdata['date']);
        $date = $dater[2].'/'.$dater[1].'/'.$dater[0];
        
        

        $sql = mysqli_query($conn, "SELECT * FROM $billid ");
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
                <strong>Total</strong>
                
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
            <td align="right">'.$row['total'].'</td>
            </tr>';

            $slno++;
            $total= $total + $row['total'];
            }


            $lastrow = '</tbody>
            <tfoot>
            <th colspan="10">Total </td>
            
            <th>'.$total.'</th>
            </tfoot>
            </table>';

            $output = $firstrow.$rows.$lastrow;
        }
        else
        {
            $output = "No Data Found";
        }
        }
        else
        {
            ?>
            <script>

            alert("Faild To Generate Bill Details");

            location.href="/dest/destributers.php";
            </script>



        <?php
        }
        
        
    }
    else
    {
        ?>
        <script>

        alert("Connection Failed");

        location.href="/dest/destributers.php";
        </script>



        <?php
    }

}
else
{
    ?>
    <script>

        alert("Bill id Not Set");

        location.href="/dest/destributers.php";
    </script>



    <?php
}

?>