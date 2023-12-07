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
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="style3.css">
    </head>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"> -->
    <?php require_once "navbar.php";?>
    <body style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
    <div class="container-fluid body" style="padding:0; overflow:hidden;">
        <div class="box1" style="height:580px; width:100%;">
            <div class="box3" style="display:flex; justify-content: center;
                flex-direction:column; align-items:center;">
                    <h4><b>USER LOGIN</b></h4>
                    <?php
                        if(isset($_POST["btn1"])){
                        $n=$_POST["name"];
                        $p=$_POST["pass"];
                        $e=$_POST["email"];
                        $sql="SELECT RID,FNAME,EMAIL FROM register
                         WHERE FNAME='{$n}' AND PASS='{$p}' AND EMAIL='{$e}'";
                        $result=($con->query($sql));
                        if($result->num_rows>0){
                        $row=$result->fetch_assoc();
                        $_SESSION["rid"]=$row["RID"];
                        $_SESSION["fname"]=$row["FNAME"];
                        $_SESSION["email"]=$row["EMAIL"];
                        // ?id=<?php echo $row["RID"];
                        echo'<script>window.open("user_home.php","_self")</script>';
                        }
                        else{
                            echo"<div class='alert alert-danger'>Invalid Usname or Password</div>";
                        }
                        }
                    ?>
                    <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="post" autocomplete="off">
                    <label class="in">NAME</label>
                    <input type="text" class="form-control" require="" placeholder="Enter your name" name="name">
                    <label class="in">PASSWORD</label>
                    <input type="password" class="form-control" require="" placeholder="Enter your password" name="pass">
                    <label class="in">EMAIL</label>
                    <input type="email" class="form-control" require="" placeholder="Enter your email" name="email">
                    <div style="text-align:center;">
                    <button type="submit" class="mt-3 mb-3" name="btn1"><b>Register</b></button><br>
                    <span class=""><b class="text-secondary mb-3">Or</b><br><a href="register.php" style="font-size:17px;">Newuser create account?</a></span>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>  
    </body>
    </html>