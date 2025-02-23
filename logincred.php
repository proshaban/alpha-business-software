<?php
include 'dest/conc.php';

$id = $_POST['loginid'];
$pass = $_POST['password'];

$sql = mysqli_query($conn, "SELECT * FROM `usercred` WHERE `loginid` = '$id' ");

if($sql)
{
    if(mysqli_num_rows($sql)>0)
    {
        $row = mysqli_fetch_assoc($sql);

        if($pass == $row['pass'])
        {

            setcookie('usid', $row['id'], time()+(86400 * 4));
            echo "success";
        }
        else
        {
            echo "!! Wrong Password !! ";
        }
    }
    else
    {
        echo "!! User Not Exsist !!";
    }
}
else

{
    echo "!! Connection Faild !!";
}




?>