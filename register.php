<?php
 include "config.php";
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style3.css">
    <?php include "head.php";?>

</head>
<!-- <link rel="stylesheet" href="style3.css"> -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
<body style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
    <?php require_once "navbar.php";?>
    <div class="container-fluid p-4" style="padding:0; overflow:hidden; ">
        <div class="box1" style="height:580px; width:100%; ">
            <div class="box4" style="display:flex; justify-content: center;
        flex-direction:column; ">

        <div style="font-weight:900; font-size:25px; text-align:center;" class="text-primary mb-2">User Registeration</div>
            <?php 
                    if(isset($_POST["btn1"])){
                    $folder="profile/";
                    $imgreg=$folder.basename($_FILES["rimg"]["name"]);
                    if(move_uploaded_file($_FILES["rimg"]["tmp_name"],$imgreg)){
                $sql="INSERT INTO register(FNAME,LNAME,EMAIL,PNO,PASS,CITY,RIMG) VALUES
                ('{$_POST["fname"]}','{$_POST["lname"]}','{$_POST["email"]}',
                '{$_POST["pno"]}','{$_POST["pass"]}','{$_POST["city"]}',
                '{$imgreg}')";
                if($con->query($sql)){
                    echo"<div class='alert alert-success'><span class='fa fa-check text-success'></span> Registration success</div>";
                }
                else{
                    echo"<div class='alert alert-danger'>Registration Failed</div>";
                }
                }else{
                    echo"<div class='alert alert-warning'>Something went wrong</div>"; 
                }
                    
                }
            ?>
        <form action="<?php echo $_SERVER ["REQUEST_URI"] ?>" method="post"
         autocomplete="off" enctype="multipart/form-data">
            <div class="container" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                <div class="row">
                    <div class="col-md-6">
                        <span class=""style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:17px;"><label>First Name</label><br>
                        <input type="text"  style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;" class="form-control mb-2" placeholder="Enter your name" name="fname">
                        </span>
                        <span class=""style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:17px;"><label>Email</label><br>
                        <input type="email"  style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;" class="form-control mb-2" placeholder="Enter your email" name="email">
                        </span>
                        <span class=""style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:17px;"><label>Password</label><br>
                        <input type="password"  style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;" class="form-control mb-2"  placeholder="Enter your password" name="pass">
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span class="" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:17px;"><label>Last name</label><br>
                        <input type="text" class="form-control mb-2"  style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;" placeholder="Enter your Username" name="lname">
                        </span>
                        <span class="" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:17px;"><label>Phone Number</label><br>
                        <input type="number" class="form-control mb-2"  style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;" placeholder="Enter your number" name="pno">
                        </span>
                        <span class="" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:17px;"><label>City</label><br>
                        <input type="text" class="form-control mb-2"  
                        style="font-family: Cambria, Cochin, Georgia, Times, 
                        'Times New Roman', serif;" placeholder="Enter your city"
                         name="city">
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="text-align:center; ">
                    <label for="" style="font: size 17px;">Select Profile Picture</label><br>
                    <input type="file" class="form-control" name="rimg"><br>
                        <button class="btn btn-info mb-1" name="btn1">Regsister</button><br>
                        <span class=""><b><u class="text-warning m-3">Or</u></b><br><a href="user.php" 
                        style="font-size:20px;">Login Page...!</a></span>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div> 
    </form>
            
        
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>  
   
</body>
</html>