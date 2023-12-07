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
        <div class="row">
            <div class="col-md-3">
                <?php include "sidebar.php"; ?>
            </div>
            <div class="col-md-6"><br>
                <h4> EDIT CATEGORY</h4>
                <?php
                if(isset($_POST["btn4"])){
                    $cname=$_POST["cname"];
                    $sql="UPDATE category SET CNAME='$cname' WHERE CID={$_GET["id"]}";
                    if($con->query($sql)){
                        echo"<div class='alert alert-success'><span class='fa fa-check text-success'></span>Edit success</div>";
                    }
                    else{
                        echo"<div class='alert alert-danger'> Edit Failed</div>";
                    }
                    }
                    $sql="SELECT CID,CNAME FROM category WHERE cid={$_GET["id"]}";
                    $res=$con->query($sql);
                    if($res->num_rows>0){
                        $r=$res->fetch_assoc();                   
                     }
                ?>

        <form action="<?php echo $_SERVER ["REQUEST_URI"] ?>" method="post" autocomplete="off">
        <label> CATEGORY</label>
        <input type="text" placeholder="Enter category" value="<?php echo $r["CNAME"] ;?>" name="cname">
        <button type="submit" name="btn4"  class="btn3">EDIT</button>
        </form>
                </div>
                </div>
            </div>
    </body>
</html>