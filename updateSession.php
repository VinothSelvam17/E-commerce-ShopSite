<?php
    session_start();
    include_once "config.php";

    if(isset($_SESSION["cart"])){
        $pid_array=array_column($_SESSION["cart"],"pid");

    }
    if(in_array "{$_GET['pid']}",$pid_array){
        for($i=0;$i<count($_SESSION["cart"]);$i++){
            if($_SESSION["cart"][$i]["pid"]==$_POST["pid"]){
                $_SESSION["cart"][$i]["qty"]=$_POST["qty"];
            }
         }
    
    }
    
?>
