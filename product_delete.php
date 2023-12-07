<?php 
    include "config.php";
    session_start();
    
    
    $sql="DELETE FROM product WHERE PID={$_GET["id"]}";
    if($con->query($sql)){
        echo '<script>alert("Record Delete");window.open("product_view.php","_self")</script>';

    }
?>
 
                        