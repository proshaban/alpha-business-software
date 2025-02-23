<?php
include 'conc.php';
$usid = $_POST['usid'];
$dest= explode('-',$_POST['destid']);
$destid = '%DT'.dest[1].'%';
$pass = $_POST['pass'];

if(isset($usid))
{
    //$passcheck = mysqli_query($conn, "SELECT * FROM `usercred` WHERE `loginid` = '$usid' AND `pass` = '$pass' ");

    //if(mysqli_num_rows($passcheck)>0)
    //{
        $deleteDes = mysqli_query($conn, "DELETE TABLE_NAME LIKE '$destid' FROM INFORMATION_SCHEMA.TABLES ");

        if($deleteDes)
        {
            ?><script>
            alert("!!! Destributer Deleted !!!");
            location.href="destributers.php";

        </script>
        }
        else
        {
            ?><script>
            alert("!!! Unable to Delete Tables related to Destributer !!!");
            location.href="destributers.php";

        </script>
    <?php
        }
       // SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME LIKE '%DT100002%' LIMIT 0 , 10;
    //}
   /* else
    {
        ?><script>
        alert("!!! Password Not Matched !!!");
        location.href="destributers.php";

    </script>
    <?php

    }*/
}
else
{
    ?><script>
        alert("!!! Id Not Set !!!");
        location.href="destributers.php";

    </script>
    <?php
}
?>