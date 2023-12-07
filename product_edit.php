    <?php 
    include "config.php";
    session_start();
    $sql="SELECT c.CNAME,p.* FROM product p INNER JOIN category c ON p.CID=
    c.CID WHERE p.PID='{$_GET["id"]}'";
    $res=$con->query($sql);
    if($res->num_rows>0){
        $r=$res->fetch_assoc();
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
                <h4> EDIT PRODUCT</h4>
                <?php
                if(isset($_POST["btn8"])){
                    $folder="products/";
                    $imgpic=$folder.basename($_FILES["pimg"]["name"]);
                    if(move_uploaded_file($_FILES["pimg"]["tmp_name"],$imgpic)){
                        $sql="UPDATE product SET CID='{$_POST["cid"]}',PNAME='{$_POST["pname"]}',
                        PRATE='{$_POST["prate"]}',PIMG='{$imgpic}' WHERE PID={$_GET["id"]}";
                        if($con->query($sql)){
                            echo"<div class='alert alert-success'><span 
                            class='fa fa-check text-success'></span> Addes success</div>";
                        }
                        else{
                            echo"<div class='alert alert-danger'>Added Failed</div>";
                        }
                        }else{
                            echo"<div class='alert alert=danger'>Something went wrong</div>";
                        }
                    }
                    $sql="SELECT c.CID,c.CNAME,p.* FROM product p INNER JOIN category c ON 
                    p.CID=c.CID WHERE p.PID={$_GET["id"]}";
                    $res=$con->query($sql);
                    if($res->num_rows>0){   
                        $r=$res->fetch_assoc();                   
                     }
                ?>
        <form action="<?php echo $_SERVER ["REQUEST_URI"] ?>" method="post" autocomplete="off"
        enctype="multipart/form-data">
        <div class="row mt-md-3">
        <div class="col-md-6">
        <label>category</label>
        <Select class="form-control col-md-9" type="text"  name="cid">
                <option  value="<?php echo $r["CID"] ;?>" ><?php 
                echo $r["CNAME"]; ?></option>
                <?php 
                $sql="SELECT CID,CNAME FROM category";
                $res=$con->query($sql);
                if($res->num_rows>0){
                    while($r=$res->fetch_assoc()){
                        echo "<option value='{$r['CID']}'>'{$r['CNAME']}'</option>";
                    }
                }
                ?>            
                </select>
                </div>
            <div class="col-md-6">
            <label> Product name</label>
        <input type="text" class="form-control" placeholder="Enter product"
         value="<?php echo $r["PNAME"] ;?>" name="pname">               
            </div>
             </div>
        <div class="row mt-md-3">
            <div class="col-md-6">
            <label>Edit Rate</label>
                <input type="rate"class="form-control" placeholder="Enter rate"
                value="<?php echo $r["PRATE"] ;?>" name="prate">
            </div>
        <div class="col-md-6">
            <label>Product img</label>
            <input type="file" class="form-control" value="<?php echo $r["PIMG"] ;?>"
             name="pimg">
        </div>
        </div>
            <div class="row mt-md-3">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success mt-md-4" 
                    name="btn8"  class="btn3">EDIT</button>
                </div>
                <div class="col-md-6">
                <button type="button" class="btn btn-info mt-md-4" 
               ><a href="add_more.php?pid=<?php echo $_GET['id'] ?>">Add_More</a></button>
                </div>
            </div>
        </form>
                </div>
                </div>
            </div>
    </body>
</html>