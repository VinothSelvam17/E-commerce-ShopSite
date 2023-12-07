<?php
    session_start();
    include_once "config.php";

    if(isset($_SESSION["cart"])){
        $pid_array=array_column($_SESSION["cart"],"pid");

    }
    if(in_array "{$_GET['pid']}",$pid_array){
        foreach($_SESSION["cart"] as $k=>$v){
            if($v["pid"]==$_GET["pid"]){
                unset($_SESSION["cart"][$k]);
                echo "<script>window.open('cart_item.php','_self');</script>";
            }
        }
    }
?>
