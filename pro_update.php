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
    <div class="box2 mt-3">
        <div class="" style="font-size:25px; font-weight:900; text-align:center;">Update User</div>
            <?php   
                    if(isset($_POST["btn"])){
                    $fname=$_POST["fname"];
                    $lname=$_POST["lname"];
                    $email=$_POST["email"];
                    $pno=$_POST["pno"];
                    $pass=$_POST["pass"];
                    $city=$_POST["city"];
                 $sql="UPDATE register SET FNAME='$fname',LNAME='$lname',EMAIL='$email',
                 PNO='$pno',PASS='$pass',CITY='$city' WHERE RID={$_SESSION["rid"]}";
                if($con->query($sql)){
                    echo"<div class='alert alert-success'><span class='fa fa-check text-success'></span> Registration success</div>";
                }
                else{
                    echo"<div class='alert alert-danger'>Registration Failed</div>";
                }
                }
                $sql="SELECT FNAME,LNAME,EMAIL,PNO,PASS,CITY FROM register WHERE RID={$_SESSION["rid"]}";
                    $res=$con->query($sql);
                    if($res->num_rows>0){
                        $reg=$res->fetch_assoc();                   
                     }
            ?>
            <div class="col-md-12">
        <form action="<?php echo $_SERVER ["REQUEST_URI"] ?>" method="post" 
        autocomplete="off" enctpye="multipart/form-data">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-md-6" >
                <span class="" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"><label>First Name</label><br>
                <input type="text" class="form-control" placeholder="Enter your name "
                value="<?php echo $reg["FNAME"] ;?>" name="fname">
                </span>
                <span class="" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"><label>Email</label><br>
                    <input type="email" class="form-control" placeholder="Enter your email"
                    value="<?php echo $reg["EMAIL"] ;?>" name="email">
                </span>
                <span style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"><label>Password</label><br>
                    <input type="password" class="form-control" placeholder="Enter your password"
                    value="<?php echo $reg["PASS"] ;?>" name="pass">
                </span>
                </div>
                <div class="col-md-6">
                <span class="" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"><label>Last name</label><br>
                    <input type="text" class="form-control" placeholder="Enter your Username" 
                    value="<?php echo $reg["LNAME"] ;?>" name="lname">
                    </span>
                    <span class="" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"><label>Phone Number</label><br>
                    <input type="number" class="form-control" placeholder="Enter your number" 
                    value="<?php echo $reg["PNO"] ;?>"name="pno">
                </span>
                <span style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"><label>City</label><br>
                    <input type="text" class="form-control" placeholder="Enter your city"
                     value="<?php echo $reg["CITY"] ;?>" name="city">
                </span>
                </div>
            </div>
        </div>
        <div class="container">
        <div class="row">
                <div class="col-md-12">
                <span><button class="btn1 btn btn-success" style="font-size:17px; text-align:center;"
                 name="btn">Update</button></span>
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