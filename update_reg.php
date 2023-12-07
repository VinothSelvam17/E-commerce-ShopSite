<?php 
    include "config.php";
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <?php include "head.php";?> -->
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
<body>    
    <?php require_once "navbar.php";?>
<div class="container">
            
<div class="row" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
    <div class="col-md-3">
     <?php include "sidebar.php"; ?>
    </div>
    <div class="mt-3">
        <div class="" style="font-size:25px; font-weight:900; text-align:center;">Update Image</div>
            <?php 
                if(isset($_POST["upbtn"])){
                $folder="profile/";
                $imgreg=$folder.basename($_FILES["rimg"]["name"]);
                if(move_uploaded_file($_FILES["rimg"]["tmp_name"],$imgreg)){
                $sql="UPDATE re gister SET RIMG='{$imgreg}' WHERE RID={$_GET["rid"]}";
                if($con->query($sql)){
                    echo"<div class='alert alert-success'><span class='fa fa-check text-success'></span> Registration success</div>";
                }
                else{
                    echo"<div class='alert alert-danger'>Registration Failed</div>";
                }
                }
                else{
                    echo"<div class='alert alert-warning'>Something went wrong</div>"; 
                }
            }
                $sql="SELECT RIMG FROM register WHERE RID={$_SESSION["rid"]}";
                    $res=$con->query($sql);
                    if($res->num_rows>0){
                        $r=$res->fetch_assoc();
                    }
            ?>
            <div class="col-md-12">
        <form action="<?php echo $_SERVER ["REQUEST_URI"] ?>" method="post" 
        autocomplete="off" enctpye="multipart/form-data">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-md-6">
                    <input type="file" class="form-control" name="rimg"
                    value="<?php echo $r["RIMG"] ;?>">
                </div>
                <div class="col-md-6">
                    <img src="<?php echo $r["RIMG"] ;?>" class="thumbnail" height="150" width="230">
                </div>
            </div>
        </div>
        <div class="container">
        <div class="row">
                <div class="col-md-12">
                <span><button class="btn btn-success" style="font-size:17px; text-align:center;"
                 name="upbtn">Update</button></span>
                </div>
            </div>
        </div>
            </div>
            </div>
        </div>
        </form>
    </div>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>  
   
</body>
</html>