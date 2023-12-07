<?php 
    include "config.php";
    session_start();
    
    $sql="DELETE FROM retiler WHERE REID={$_GET["id"]}";
    if($con->query($sql)){
        echo '<script>alert("Record Delete");window.open("view_retiler.php","_self")</script>';

    }
?>
