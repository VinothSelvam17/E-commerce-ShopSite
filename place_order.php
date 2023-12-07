<?php
    session_start();
    include "config.php";
    $orderno=1;
    $sql="SELECT COUNT(distinct(ORNO)) AS orno FROM orders";
    $res=$con->query($sql);
    if($res->num_rows>0){
        $r=$res->fetch_assoc();
        $orderno=$r["orno"]+1;   
    }
    $orderno="SS0".$orderno;
     $sql="INSERT INTO orders(ORNO,RID,PID,QTY,RATE,ODATE,STATUS) VALUES";
    $rows=array();//[]
    foreach($_SESSION["cart"] as $k=>$v){
         $rows[]="('$orderno',{$_SESSION["rid"]},{$v["pid"]},
        {$v["qty"]},{$v["prate"]},NOW(),0)";
        
    }
   echo $sql.=implode(",",$rows);
    if($con->query($sql)){
        echo "Your Order Placed..Order No :".$orderno;
    }else{
        echo "Failed";
    }
    foreach($_SESSION["cart"] as $k=>$v){
        unset($_SESSION["cart"][$k]);
    }
?> 