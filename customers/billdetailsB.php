<?php
include 'conc.php';

if(isset($_GET['billid']))
{
    $billid = $_GET['billid'];

    $cusid = $billid[0].$billid[1].$billid[2].$billid[3];

    $dest = mysqli_query($conn, "SELECT * FROM `customers` WHERE `id` = '$cusid[3]' ");


    if($dest)
    {
        $row = mysqli_fetch_assoc($dest);

        $name = $row['name'];
        $email = $row['email'];
        $phone =$row['mobile1'];
        $billno = $billid;

    

        $csls = mysqli_query($conn, "SELECT * FROM $billid WHERE `id` = '1' ");

        $csdata = mysqli_fetch_assoc($csls);
        
        $btime = $csdata['time'];

        $bedate = explode("-", $csdata['date']) ;

        $bdate = $bedate[2]."/".$bedate[1]."/".$bedate[0];
        
        

        
        
        

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
            <td align="right">'.$row['total'].'</td>
            </tr>';

            $slno++;
            $total= $total + $row['total'];
            }


            $lastrow = '</tbody>
            <tfoot>
            <th colspan="5">Total </td>
            
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