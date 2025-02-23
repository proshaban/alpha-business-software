<?php

$id = $_COOKIE['usid'];
setcookie('usid', $id, time()+(0));
?>
<script>
    location.href="index.php";
</script>