<?php

include 'conc.php';
if(!isset($_GET['table']))
{
    ?> 

    <script>
        alert("BIll Id Not Set ");

    </script>

    <?php
}
else
{

    $table = $_GET['table'];

    $info = mysqli_query($conn, "SELECT * FROM `dailylist` WHERE `table` = '$table' ");

    $datas = mysqli_fetch_assoc($info);

    $dat = explode("-", $datas['date']);

    $datef = $dat[2].'/'.$dat[1].'/'.$dat[0];

    $date = $datef;

    $time = $datas['time'];






    $sql = mysqli_query($conn, "SELECT * FROM $table ");



if($sql)
{
    if(mysqli_num_rows($sql)>0)
    {

        $rows ="";
        $head = '<table><thead>

        <th>
            <strong> Sl.No</strong>
        </th>
        <th>
            <strong>Name Of Product </strong>
        </th>
        <th>
            <strong>Quantity</strong>
        </th>
        <th>
            <strong>Rate</strong>
            <article>(IOT)</article>
        </th>
        
        <th>
            <strong>Total</strong>
            <article>(IOT)</article>
        </th>
    </thead>
    <tbody>';



        $slno =1;
        $total=0;

        
        while($row = mysqli_fetch_assoc($sql))
        {
          
            $rows .= '<tr>
            <td>'.$slno.'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['quantity'].'</td>
            <td>'.$row['Sprice'].'</td>
            <td>'.$row['amount'].'</td>
        </tr>';
        
         

         $date = $datef;
              
          
            $total = $total + $row['amount'];
            
          $slno++;
          
        }

        
        $tail = '</tbody>
            <tfoot>
                <th colspan="4">Total </td>
                
                <th>'.$total.'</th>
                
            </tfoot>
        </table>';


    }
    else
    {
         $output = "No Record Found";

 
    }
   
}
else
{
    $output = " NO TABLE FOUND ";
} 
}


?>