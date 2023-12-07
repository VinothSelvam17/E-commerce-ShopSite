<?php 
    include "config.php";
    session_start();
  
    
    $sql="DELETE FROM pro_fus WHERE TID={$_GET["id"]}";
    if($con->query($sql)){
        echo "<script>alert('Record Delete');window.open('add_feature.php?pid=
        {$_GET["pid"]}','_self')</script>";

    }
?>