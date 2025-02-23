<?php
include 'conc.php';
date_default_timezone_set('Asia/Kolkata');
$today = date('d-m-Y');


//generate product list 
$sortby = $_POST['sortby'];

$mysql = "SELECT * FROM `customers` ORDER BY $sortby DESC";



$sql = mysqli_query($conn, $mysql);

if($sql)
{
    if(mysqli_num_rows($sql)>0)
    {

        

        $slno = 1;
        
        $total=0;
        $rows ="";
        $paid = 0;
        $dues =0;

        while($row = mysqli_fetch_assoc($sql))
        {
            

            if($row['dues']<= '0')
            {
              $day =0;
            }
            else
            {
            
              $diff = strtotime($row['date']) - strtotime($today);
              
              $day =  abs(round($diff / 86400));
            }

            $rows .= '<tr onclick="location.href=\'transactions.php?cusId=CUS_'.$row['id'].'\'">
            <td>'.$slno.'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['dues'].'</td>
            <td>'.$day.'</td>
            </tr>';

            $slno++;
            $total= $total + $row['total'];
            $paid = $paid + $row['paid'];
            $dues = $dues + $row['dues'];
        }

        $firstrow = '<table>
        <input type="text" id="tAmount" value="'.$total.'" hidden>
        <input type="text" id="pAmount" value="'.$paid.'" hidden>
        <input type="text" id="dAmount" value="'.$dues.'" hidden>
        <thead>
          <th>
            <strong> Sl.No</strong>
          </th>
          <th>
            <strong> Name </strong>
          </th>
          <th>
            <strong> Dues </strong>
          </th>
          <th>
            <strong> Days </strong>
          </th>

        </thead>
        <tbody style="text-align:center;">';
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
    echo "Unable To Connect With Database";
}



?>