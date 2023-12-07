<?php
    session_start();
    include "config.php";

    $sql="SELECT * FROM rating WHERE RID={$_POST["rid"]} AND PID={$_POST["pid"]}";
    $res=$con->query($sql);
    if($res->num_rows>0){
       echo $sql2="UPDATE rating SET 
       RATE={$_POST["prate"]} WHERE RID={$_POST["rid"]} 
       AND PID={$_POST["pid"]}"; 
    }else{
        echo $sql2="INSERT INTO rating(RID,PID,RATE) VALUES('{$_POST["rid"]}',
        '{$_POST["pid"]}','{$_POST["prate"]}'"; 
    }
$con->query($sql2);

?>