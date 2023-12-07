<?php 
    include "config.php";
    session_start();
    
    
    $sql="DELETE FROM category WHERE CID={$_GET["id"]}";
    if($con->query($sql)){
        echo '<script>alert("Record Delete");window.open("category.php","_self")</script>';

    }
?>
