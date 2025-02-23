<?php
include 'conc.php';

date_default_timezone_set('Asia/Kolkata');

if(!isset($_GET['cusId']))
{
    ?> 
    <script>

    
    alert("Customer Id Not Set");
    location.href="/customers/customers.php";
    </script>
    <?php
}
else
{

$cusid = $_GET['cusId'];

$random = rand('10000','99999');

$date = date("d/m/Y");

//add new transaction to destributer list to set last id 
$sqlad = mysqli_query($conn, "INSERT INTO $cusid (`date`,`type`,`transtable`) VALUES ('$date','Under Process','$random')");

//new get the last id in destid list

$sqlid = mysqli_query($conn, "SELECT * FROM $cusid WHERE `transtable`= '$random'");

$rowid = mysqli_fetch_assoc($sqlid);

$newid = $rowid['id'];

$t= explode('_',$cusid);


// now will will define new table to store transaction data
// format will be eg "DT000002000001; where fist 6 digit is destributers details and last six numbers are transid

$table_id = 100000+$newid;


$tablename = "CS_".$t[1].$table_id;

mysqli_query($conn, "CREATE TABLE $tablename(
    
    id int(5) NOT NULL AUTO_INCREMENT, 
    name varchar(50),
    model varchar(15),
    quantity int(5),
    rateE int(5),
    total int(5),
    time varchar(15),
    date varchar(15),
    PRIMARY KEY(id)
);");

$sql = mysqli_query($conn, "SELECT * FROM `customers` WHERE `id` ='$t[1]' ");

$name = "Loading...";
$email = "Loading...";
$mobile1 = "Loading...";
$mobile2 = "Not Available";
$date = "Loading...";


if(mysqli_num_rows($sql)>0)
{
    while($row = mysqli_fetch_assoc($sql))
    {
        $name = $row['name'];
        $email = $row['email'];
        $mobile1 = $row['mobile1'];
        $mobile2 = $row['mobile1'];
        $date = date('d/m/Y');
    }
}
else
{
    $name = "NO RECORD FOUND GO TO START";
}

}
?>