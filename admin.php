<?php 
     include "config.php";
     session_start();

?>

<html>
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style3.css">
    </head>
    <?php require_once "navbar.php";?>

    <body style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
    <div class="container-fluid .body" style="padding:0; overflow:hidden;">
        <div class="box1" style="height:580px; width:100%;">
            <div class="box2" style="display:flex; justify-content: center;
       flex-direction:column; align-items:center;">
                <h3>ADMIN LOGIN</h3>
                <?php
                    if(isset($_POST["btnlog"])){
                    $n=$_POST["name"];
                    $p=$_POST["pass"];
                    $sql="SELECT AID,ANAME FROM admin WHERE ANAME='{$n}' AND APASS='{$p}'";
                    $result=($con->query($sql));
                    if($result->num_rows>0){
                    $row=$result->fetch_assoc();
                    $_SESSION["aid"]=$row["AID"];
                    $_SESSION["aname"]=$row["ANAME"];

                    echo'<script>window.open("admin_home.php","_self")</script>';
                    }
                    else{
                        echo"<div class='alert alert-danger'>Invalid Usname or Password</div>";
                    }
                    }
                ?>
                <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="post" autocomplete="off">
                    <label class="">NAME</label>
                    <input type="text" class="form-control" placeholder="Enter your name" require="" name="name">
                    <label class="">PASSWORD</label>
                    <input type="password" class="form-control" placeholder="Enter your password" require="" name="pass">
                    <div><button type="submit" name="btnlog">LOGIN</button></div>
                </form>    
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>  

    </body>
</html>