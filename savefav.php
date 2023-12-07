<?php
    session_start();
    include "config.php";

    $sql="INSERT INTO fav(RID,PID) VALUES('{$_POST["rid"]}','{$_POST["pid"]}')";
    if($con->query($sql)){
        echo 'Product added your favourite list';
    }else{
        echo 'Failed';
    }
?>