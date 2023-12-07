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
    <!-- <?php include "head.php";?>     -->
</head>
<?php require_once "navbar.php";?>

    <body style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
    <div class="container-fluid body" style="padding:0; overflow:hidden;">
        <div class="box1" style="height:580px; width:100%;">
            <div class="box2" style="display:flex; justify-content: center;
       flex-direction:column; align-items:center;">
                <h4>Retiler Registration</h4>
                <?php
                if(isset($_POST["btn5"])){
                    $rname=$_POST["rname"];
                    $rcode=$_POST["rcode"];
                    $sql="SELECT REID,RNAME FROM retiler WHERE
                     RNAME='$rname' AND RCODE='$rcode'";
                    $res=$con->query($sql);
                    if($res->num_rows>0){
                    $row=$res->fetch_assoc();
                    $_SESSION["reid"]=$row["REID"];
                    $_SESSION["rname"]=$row["RNAME"];
            
                    echo'<script>window.open("retiler_home.php","_self")</script>';
                    }
                    else{
                        echo"<div class='alert alert-danger'>Invalid Usname or Password</div>";
                    }
                    }
                ?>
                <form action="<?php echo $_SERVER ["REQUEST_URI"] ?>" method="post" autocomplete="off">
                    <label>Retiler Name</label>
                    <input type="text" placeholder="Enter name"  name="rname" class="form-control" >
                    <divlabel>Retiler Code</label>                    
                    <input type="password" placeholder="Enter code"  name="rcode" class="form-control">
                    <div><button type="submit" name="btn5" class="btn4">Submit</button></div>
            </div>                
                </form>
       
            </div>
        </div>

</body>
</html>