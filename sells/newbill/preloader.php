<?php
if(!isset($_COOKIE['usid']))
{
    ?>

    <script>
        alert("!Login Session Expired!");
        location.href="/index.php";
    </script>
<?php

}
else {
include 'conc.php';

date_default_timezone_set('Asia/Kolkata');

$usid = $_COOKIE['usid'];

$random = rand(10000,99999);

$table = "T".$random;

mysqli_query($conn, "CREATE TABLE $table(
    
    id int(5) NOT NULL AUTO_INCREMENT, 
    name varchar(50),
    model varchar(15),
    quantity int(5),
    Sprice int(5),
    amount int(5),
    time varchar(15),
    date varchar(15),
    PRIMARY KEY(id)
);");
}
?>