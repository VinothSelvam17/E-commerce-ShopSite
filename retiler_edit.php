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
    <link rel="stylesheet" href="style.css">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include "sidebar.php"; ?>
            </div>
            <div class="col-md-6 mt-md-4">
                <h4 class="font-weight-bold"> EDIT RETILER</h4>
                <?php
                if(isset($_POST["btn6"])){
                    $code=$_POST["rcode"];
                    $name=$_POST["rname"];
                    $mail=$_POST["rmail"];
                    $com=$_POST["rcom"];
                    $city=$_POST["rcity"];
                    $pin=$_POST["rpin"];
                    $pno=$_POST["rpno"];
                    $sql="UPDATE retiler SET RCODE='$code',RNAME='$name',RMAIL='$mail',
                    RCOM='$com',RCITY='$city',RPIN='$pin',RPNO='$pno' WHERE REID={$_GET["id"]}";
                  
                    if($con->query($sql)){
                        echo"<div class='alert alert-success'><span class='fa fa-check text-success'></span>Edit success</div>";
                    }
                    else{
                        echo"<div class='alert alert-danger'> Edit Failed</div>";
                    }
                    }
                    $sql="SELECT REID,RNAME,RCODE,RMAIL,RCOM,RCITY,RPIN,RPNO FROM retiler WHERE reid={$_GET["id"]}";
                    $res=$con->query($sql);
                    if($res->num_rows>0){
                        $r=$res->fetch_assoc();                   
                     }
                ?>
            <form action="<?php echo $_SERVER ["REQUEST_URI"] ?>"
             method="post" autocomplete="off">
                     <div class="row mt-md-3">
                        <div class="col-md-6">
                        <label>Edit Code</label>
        <input class="form-control" type="text" placeholder="Edit code" 
        value="<?php echo $r["RCODE"] ;?>" name='rcode'>

                        </div>
                        <div class="col-md-6">
                        <label>Edit Name</label>
        <input type="text" class="form-control" placeholder="Edit name"
         value="<?php echo $r["RNAME"] ;?>" name='rname'>

                   </div>
                     </div>
        <div class="row mt-md-3">
            <div class="col-md-6">
        <label>Edit email</label>
        <input type="text" class="form-control" 
        placeholder="Edit code" 
        value="<?php echo $r["RMAIL"] ;?>" name="rmail">
                    </div>
        <div class="col-md-6">
        <label>Edit company</label>
        <input type="text" class="form-control" placeholder="Edit company"
         value="<?php echo $r["RCOM"] ;?>" name="rcom">
            </div>
        </div>
        <div class="row mt-md-3">
            <div class="col-md-6">
            <label>Edit city</label>
        <input type="text" class="form-control" placeholder="Edit city" value="<?php echo $r["RCITY"] ;?>" name="rcity">
                    </div>
                    <div class="col-md-6">
        <label>Edit Pin</label>
        <input type="text" class="form-control" placeholder="Edit pin" value="<?php echo $r["RPIN"] ;?>" name="rpin">
            </div>
        </div>
        <div class="row mt-md-3">
            <div class="col-md-6">
        <label>Edit Pno</label>
        <input type="text" class="form-control" placeholder="Edit pno" value="<?php echo $r["RPNO"] ;?>" name="rpno">
                    </div>
                    <div class="col-md-6">
        <button class="btn btn-success mt-md-4" type="submit" name="btn6"  class="btn3">EDIT</button>
                    </div>
                    </div>
        </form>
                    </div>
       
                </div>
                </div>
            </div>
    </body>
</html>