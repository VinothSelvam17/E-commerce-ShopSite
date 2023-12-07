<?php 
    include "config.php";
    session_start(); 
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php";?>
</head>
<body>    
    <?php require_once "navbar.php";?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include "sidebar.php"; ?>
            </div>
            <div class="col-md-9" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                <h4 class="mt-2">Retiler Detials</h4><hr>
                <?php
                 if(isset($_POST["btn3"])){
                    $rcode=$_POST["rcode"];
                    $rname=$_POST["rname"];
                    $rmail=$_POST["rmail"];
                    $rcom=$_POST["rcom"];
                    $rcity=$_POST["rcity"];
                    $rpin=$_POST["rpin"];
                    $rpno=$_POST["rpno"];
                    $sql="INSERT INTO retiler(RCODE,RNAME,RMAIL,RCOM,RCITY,RPIN,RPNO) 
                    VALUES('$rcode','$rname','$rmail','$rcom','$rcity','$rpin','$rpno')";
                    if($con->query($sql)){
                        echo"<div class='alert alert-success'><span class='fa fa-check text-success'></span> Registration success</div>";
                    }
                    else{
                        echo"<div class='alert alert-danger'>Registration Failed</div>";
                    }
                    }
                
                ?>
        <form action="<?php echo $_SERVER ["REQUEST_URI"] ?>" class="rform" method="post" autocomplete="off">
        <div class="row ">
            <div class=" col-md-6">
                <label style="font-size:17px;">Enter code :</label><br>
                <input type="code" placeholder="Enter code"  name="rcode">
            </div>
            <div class="col-md-6">
                <label style="font-size:17px;">Enter name :</label><br>
                <input type="text" placeholder="Enter name"  name="rname">
            </div>
        </div>
                <div class="row">
                    <div class="col-md-6">
        <label style="font-size:17px;">Enter email :</label><br>
        <input type="text" placeholder="Enter email"  name="rmail">
                </div>
                <div class="col-md-6">
        <label style="font-size:17px;">Enter company :</label><br>
        <input type="text" placeholder="Enter company" name="rcom">
                </div>
                </div>
                    <div class="row">
                        <div class="col-md-6">
        <label style="font-size:17px;">Enter city :</label><br>
        <input type="text" placeholder="Enter city"  name="rcity">
                </div>
                <div class="col-md-6">
        <label style="font-size:17px;">Enter pincode :</label><br>
        <input type="text" placeholder="Enter pincode"  name="rpin">
                </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
        <label style="font-size:17px;">Enter phone no :</label><br>
        <input type="text" placeholder="Enter pno" name="rpno">
                </div>
                <div class="col-md-6">
        <button class="btn btn-info mt-md-4 " type="submit" name="btn3" class="btn4">ADD DETAILS</button><br> 
                </div>
                </div>
    </form>
            </div>
        </div>
</div>
</body>
</html>