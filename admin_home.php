<?php 
    include "config.php";
    session_start();
    if(!isset($_SESSION["aid"])){
        echo '<script>alert("Accesss Donied..Please Login");window.open("shop_site.php","_self")</script>';

    }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php";?>
</head>
<body>    
    <?php require_once "navbar.php";?>
<div class="container">
        <div class="row list">
            <div class="col-md-3">
                <?php include "sidebar.php"; ?>
            </div>
            <div class="col-md-9">
                <h4 style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:25px;" class="mt-2" >Administrative control Panel</h4><hr>
            </div>
        </div>
    </div>
</body>
</html>


