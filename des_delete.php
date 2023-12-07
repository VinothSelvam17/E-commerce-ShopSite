<?php 
    include "config.php";
    session_start();
  
    
    $sql="DELETE FROM pro_des WHERE PDID={$_GET["id"]}";
    if($con->query($sql)){
        echo "<script>alert('Record Delete');window.open('add_more.php?pid=
        {$_GET["pid"]}','_self')</script>";

    }
?>