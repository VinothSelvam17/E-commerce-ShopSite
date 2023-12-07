<?php
    include "config.php";
    session_start();
    $sql="INSERT INTO pro_fus(PID,FTIT,FUS) VALUES('{$_POST["pid"]}',
    '{$_POST["ftit"]}','{$_POST["fes"]}')";
    $con->query($sql);
 ?>