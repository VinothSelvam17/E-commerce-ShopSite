<?php 
    include "config.php";
    session_start();
    if(!isset($_SESSION["rid"])){
        echo '<script>alert("Accesss Donied..Please Login");window.open("user.php","_self")</script>';

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
            <div class="col-md-9 mt-2" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                <h4>User control Panel</h4><hr>
            </div>
        </div>
    </div>
</body>
</html>
