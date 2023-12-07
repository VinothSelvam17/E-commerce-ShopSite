<?php 
    include "config.php";
    session_start();
    if(!isset($_SESSION["reid"])){
        echo '<script>alert("Accesss Donied..Please Login");window.open("retiler.php","_self")</script>';

    }
    
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <?php include "head.php";?>
</head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
<body>    
    <?php require_once "navbar.php";?>
<div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include "sidebar.php"; ?>
            </div>
            <div class="col-md-9">
                <h4>Product control Panel</h4><hr>
            </div>
        </div>
    </div>
</body>
</html>
