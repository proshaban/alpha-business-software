<?php
include 'conc.php';

date_default_timezone_set("Asia/Kolkata");
$name = "Loading...";
$emai ="Loding...";
$mobile = "Loading...";
$gst = "Loading...";
$date = date("Y-m-d");


if(!isset($_GET['cusId']))
{
    ?>
    <script>
        alert("Customer Id is not set ");
        location.href= 'customers.php';
    </script>
    <?php
}
else
{

    $cusid = $_GET['cusId'];

//generate product list 
$id = explode('_',$cusid);
$sql = mysqli_query($conn, "SELECT * FROM `customers` WHERE `id` = '$id[1]' ");

if($sql)
{
    if(mysqli_num_rows($sql)>0)
    {
        $row = mysqli_fetch_assoc($sql);
        
        $name = $row['name'];
        $mobile1 = $row['mobile1'];
        $mobile2 = $row['mobile1'];
        $email = $row['email'];
        
        $output = "Loading...";


        $sqlt = mysqli_query($conn,"SELECT * FROM `$cusid` ");
        
        if($sqlt)
        {
            if(mysqli_num_rows($sqlt)>0)
            {
                $slno =1;
                $rows ="";
                $total =0;
                $paid= 0;
                $dues =0;
                
                while($row = mysqli_fetch_assoc($sqlt)){
                    $due =0;
                    $location = 'location.href=\'billdetails.php?billid='.$row['transtable'].' \'';
                    if($row['type']==="PAYMENT")
                    {
                      $location = "alert(\'Hello world\')";
                    }
                    if($row['dues']>0)
                    {
                      $due= $row['dues'];
                    }
                    $dater = explode('-',$row['date']);
                    $date = $dater[2].'/'.$dater[1].'/'.$dater[0];
                    
                    
                    $rows .='<tr onclick="'.$location.'">
                    <td>'.$slno.'</td>
                    <td>'.$date.'</td>
                    <td>'.$row['type'].'</td>
                    <td>'.$row['billno'].'</td>
                    <td>'.$row['total'].'</td>
                    <td>'.$row['paid'].'</td>
                    <td>'.$due .'</td>
                  </tr>';

                  $total = $total+ $row['total'];
                  $paid = $paid + $row['paid'];
                  $dues = $dues + $row['dues'];
                  $slno++;
                }

                $firstrow = '<table>
                <thead>
                  <th>
                    <strong> Sl.No</strong>
                  </th>
                  <th>
                    <strong> Date </strong>
                  </th>
                  <th>
                    <strong> Type </strong>
                  </th>
                  <th>
                    <strong>Bill No.</strong>
                  </th>
                  <th>
                    <strong>Total</strong>
                  </th>
                  <th>
                    <strong>Paid</strong>
                  </th>
                  <th>
                    <strong>Dues</strong>
                  </th>
                </thead>
                <tbody>';

                $lastrow = '</tbody>
                </table>';

                mysqli_query($conn, "UPDATE `destributers` SET `total`= '$total' ,`paid` = '$paid' ,`dues`= '$dues' , `date` = '$date' WHERE `id` = '$id[1]'");
                $output = $firstrow.$rows.$lastrow;
            }
            else
            {
                $output = "No Record Found ";
            }
        }
        else
        {
            $output = "No Table Found ";
        }
    }
    else
    {
        $name = "Failed To Load Info";
    }
   
}
else
{
    $name= "Unable TO Connect To Database";
}

}

?>