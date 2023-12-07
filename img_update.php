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
                <h4 class="font-weight-bold">User Profile</h4>
                <?php
                if(isset($_POST["btn6"])){
                    // $img=$_POST["timg"];
                   echo $sql="UPDATE SET RCODE='$code' WHERE RID={$_GET["rid"]}";
                    if($con->query($sql)){
                        echo"<div class='alert alert-success'><span class='fa fa-check text-success'></span>Edit success</div>";
                    }
                    else{
                        echo"<div class='alert alert-danger'> Edit Failed</div>";
                    }
                    }
                    $sql="SELECT FNAME,LNAME,EMAIL,PNO,PASS,CITY FROM register";
                    $res=$con->query($sql);
                    if($res->num_rows>0){
                        $reg=$res->fetch_assoc();                   
                     }
                ?>
                <table class="table table-bordered">
                <thead>
                    <th>SNO</th>
                    <th>Fname</th>
                    <th>Lname</th>
                    <th>Email</th>
                    <th>PhoneNo</th>
                    <th>Password</th>
                    <th>City</th>
                </thead>
                <tbody>
                <?php 
                   $sql="SELECT RID,FNAME,LNAME,EMAIL,PNO,PASS,CITY FROM register
                    WHERE RID={$_SESSION["rid"]}";
                    $res=$con->query($sql);
                    if($res->num_rows>0){
                        $i=0;
                        while($r=$res->fetch_assoc()){
                            $i++;

                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $r["FNAME"]; ?></td>
                            <td><?php echo $r["LNAME"]; ?></td>
                            <td><?php echo $r["EMAIL"]; ?></td>
                            <td><?php echo $r["PNO"]; ?></td>
                            <td><?php echo $r["PASS"]; ?></td>
                            <td><?php echo $r["CITY"]; ?></td>
                            
                        </tr>
                    <?php
                    }
                }
                else{
                    echo 'Record Not Found';
                }
                ?>
                </tbody>
            </table>
            
                    </div>
       
                </div>
                </div>
            </div>
    </body>
</html>