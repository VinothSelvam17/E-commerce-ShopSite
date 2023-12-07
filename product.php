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
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include "sidebar.php"; ?>
            </div>
            <div class="col-md-5" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                <h4 class="mt-md-3">Product Detials</h4>
                <?php
                if(isset($_POST["btn7"])){
                        $folder="products/";
                        $imgpic=$folder.basename($_FILES["pimg"]["name"]);
                        if(move_uploaded_file($_FILES["pimg"]["tmp_name"],$imgpic)){
                        $sql="INSERT INTO product(CID,PNAME,PRATE,PIMG) VALUES
                        ('{$_POST["cid"]}','{$_POST["pname"]}','{$_POST["prate"]}'
                        ,'{$imgpic}')";
                    if($con->query($sql)){
                        echo"<div class='alert alert-success'><span class='fa fa-check 
                        text-success'></span> Addes success</div>";
                    }
                    else{
                        echo"<div class='alert alert-danger'>Added Failed</div>";
                    }
                    }else{
                        echo"<div class='alert alert=danger'>Something went wrong</div>";
                    }
                }
                ?>
        <form action="<?php echo $_SERVER ["REQUEST_URI"] ?>"
         method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="row mt-md-3">
            <div class="col-md-6">
        <label style="font-size:17px;">Category</label>
        <Select class="form-control col-md-9" type="text"  name="cid">
                <option value="-">Select category</option>
                <?php 
                $sql="SELECT CID,CNAME FROM category";
                $res=$con->query($sql);
                if($res->num_rows>0){
                    while($r=$res->fetch_assoc()){
                        echo "<option value={$r['CID']}>{$r['CNAME']}</option>";
                    }
                }
                ?>            
                </select>
                </div>
                <div class="col-md-6">
                <label style="font-size:17px;">Product name</label>
        <input type="text" class="form-control col-md-9" placeholder="Enter name"  name="pname">
                </div>
                </div>
                <div class="row mt-md-3">
                    <div class="col-md-6">
                    <label style="font-size:17px;">Product Rate</label>
        <input type="rate" class="form-control col-md-9" placeholder="Enter rate"  name="prate">
                </div>
                <div class="col-md-6">
                <label style="font-size:17px;">Product Image</label>
        <input type="file" class="form-control col-md-9" name="pimg">
                </div>
                </div>
                <div class="row mt-md-3">
                    <div class="col-md-6">
                    <button class="btn btn-info mt-md-4 " type="submit" name="btn7" class="btn4">ADD PRODUCT</button><br>                           
                </div>
    </form>
            </div>
        </div>
</div>
</body>
</html>