<?php
include 'conc.php';

$date = $_POST['date'];

$date1 = $date[2]."/".$date[1]."/".$date[0];


$total=0;
$given =0;
//generate product list 
$sql = mysqli_query($conn, "SELECT * FROM `dailylist` WHERE `date` = '$date' ");

if($sql)
{
 
    if(mysqli_num_rows($sql)>0)
    {

        $rows ="";
       

        $tail = '</tbody>
        </table>';
        $slno =1;
        
        while($row = mysqli_fetch_assoc($sql))
        {
          
          if($row['type']=="Taken")
          {
            $rows .= '<tr onclick="location.href=\'roughbill.php?table='.$row['table'].'\' ">
            <td>'.$slno .'</td>
            <td>'.$row['type'].'</td>
            <td>'.$row['amount'].'</td>
          </tr>';       
            
          $slno++;
          }
          elseif ($row['type']=="Given")
          {
            $rows .= '<tr onclick="location.href=\'/customers/billdetails.php?billid='.$row['table'].'\' ">
            <td>'.$slno .'</td>
            <td>'.$row['type'].'</td>
            <td>'.$row['amount'].'</td>
            </tr>';       

            $given = $given + $row['amount'];
            
          $slno++;
          }
            
          $total = $total + $row['amount'];
          
        }

        $head = '<table>
        <thead>
        <input type="number" id="taken" value="'.$total.'" hidden>
        <input type="number" id="given" value="'.$given.'" hidden>

          <th>
            <strong> Sl.No</strong>
          </th>
          <th>
            <strong> Transaction Type </strong>
          </th>
          <th>
            <strong> Amount </strong>
          </th>

        </thead>
        <tbody style="text-align:center;">';
        $tail = '</tbody>
        </table>';


       
        echo $head.$rows.$tail;
    }
    else
    {
         echo '<h2 align="center"> No Record Found For This Date</h2>
          <input type="number" id="taken" value="'.$total.'" hidden>
          <input type="number" id="given" value="'.$given.'" hidden>
         ';

 
    }
   
}
else
{
    echo  '<li>NO TABLE FOUND </li>
          <input type="number" id="taken" value="'.$total.'" hidden>
          <input type="number" id="given" value="'.$given.'" hidden>';
}



?>