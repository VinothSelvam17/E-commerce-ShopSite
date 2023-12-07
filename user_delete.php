<?php 
    include "config.php";
    session_start();
    
    $sql="DELETE   FROM  register WHERE RID={$_GET["id"]}";
    if($con->query($sql)){
        echo '<script>alert("Record Delete");window.open("admin_view_users.php","_self")</script>';

    }
?>
