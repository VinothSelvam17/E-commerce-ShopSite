<?php
    include "config.php";
    session_start();
    $sql="INSERT INTO pro_des(PID,PDES,PFUS) VALUES('{$_POST["pid"]}',
    '{$_POST["des"]}','{$_POST["fus"]}')";
    $con->query($sql);
?>