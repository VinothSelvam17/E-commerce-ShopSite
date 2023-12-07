<?php 
    include "config.php";
    session_start();
    
    
    $sql="DELETE FROM cmt WHERE CNID={$_GET["id"]}";
    if($con->query($sql)){
        echo '<script>alert("Record Delete");window.open("user_home.php","_self")</script>';

    }
?>
