<?php

$host = "localhost" ;
$dbuser = "root";
$pswd = "";
$dbname = "absoft";

$conn = mysqli_connect($host, $dbuser, $pswd, $dbname) ;

if(!$conn){
    header("refresh:0;url=error.php");
}

?>