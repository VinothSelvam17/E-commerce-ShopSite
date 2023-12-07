<?php 
    include "config.php"; 
    session_start();
   
  $sql="SELECT PID,PNAME,PRATE,PIMG FROM product";
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
<style>
    .fas{
        padding-right: 10px;
        font-size:25px;
        color: #808088;
        border:none;        
    }
    .fass{
        padding-right: 10px;
        font-size:25px;
        color: #ffb300;
        border:none;        
    }
</style>
<body>    
    <?php require_once "navbar.php";?>
    <div class="container-fluid">
    <h4>Pick Your Products !</h4> 
        <div class="col-md-12 mt-md-5">
            <div class="row">
            
                <div class="col-md-1">
                
                    <?php 
                        $sql="SELECT * FROM pro_img";
                        $res=$con->query($sql);
                        if($res->num_rows>0){
                            while($img=$res->fetch_assoc()){
                                echo "<img  src='products/sideimg/{$img["SIMG"]}'
                                height='50px' width='100%' style='margin-bottom:30px'>";
                            }
                        }                        
                    ?>                    
                </div>           
                <div class="col-md-4 img-fluid card">
                        <img src="<?php echo $r["PIMG"]; ?>" alt=""
                         width="100%">
                </div>
                <div class="col-md-7">
                    <h3><?php echo $r["PNAME"]; ?>
                         <?php
                            $sql="SELECT count(RID) as n,sum(RATE) as rates from rating
                            ";
                            $rate_res=$con->query($sql);
                            if($rate_res->num_rows>0){
                                $rate_row=$rate_res->fetch_assoc();
                                if($rate_row["n"]>0){
                                $ra_count=round($rate_row["rates"]/$rate_row["n"]);
                                //  echo "<pre>";
                                //     print_r($rate_row);
                                //     echo "</pre>";
                                
                                for($i=1;$i<=$ra_count;$i++){
                                    echo "<i class='fa fa-star fass'></i>";
                                }

                            }
                        }
                        ?>
                            <button type="button" class="btn btn-warning " 
                            id="fav"><i class="fa fa-heart"></i></button>
                            <span class="pull-right" style="font-size:14px;padding-right:10px" 
                            id="out"></span>
                    </h3><hr>

                    <?php
                        for($i=1;$i<=5;$i++){
                            echo "<button class='fa fa-star fas' id='{$i}' type='button'></button>";                            
                        }
                    ?>
                    <h2><b>&#8377; <?php echo $r["PRATE"]; ?>.00</b></h2><hr>
                    <h4 style="color:blue"><b>Know More Details of your Product</b></h4>
                    <div class="col-md-6">
                        <ul>
                            <?php 
                                $sql="SELECT * FROM pro_des";
                                $res=$con->query($sql);
                                if($res->num_rows>0){
                                    while($des=$res->fetch_assoc()){
                                        echo "<li>{$des["PDES"]}</li>";
                                    }
                                }                      
                            ?>                        
                        </ul>
                        <?php 
                            if(isset($_POST["addcart"])){
                                if(isset($_SESSION["cart"])){
                                    $pid_array=array_column($_SESSION["cart"],"pid");
                                    //  echo "<pre>";
                                    // print_r($pid_array);
                                    // echo "</pre>";
                                    $index=count($_SESSION["cart"]);
                                    echo $index;
                                   if(in_array("{$_POST["pid"]}",$pid_array)){
                                    
                                   // echo "true";
                                        for($i=0;$i<count($_SESSION["cart"]);$i++)
                                        {
                                            if($_SESSION["cart"][$i]["pid"]==$_POST["pid"]){
                                                $_SESSION["cart"][$i]["qty"]+=$_POST["qty"];
                                            }
                                        }
                                        echo "<script>window.open('cart_item.php','_self');</script>";

                                   }else{
                                        $item=array(
                                            "pid"=>$_POST["pid"],
                                            "pname"=>$_POST["pname"],
                                            "prate"=>$_POST["prate"],
                                            "pimg"=>$_POST["pimg"],
                                            "qty"=>$_POST["qty"]
                                        );
                                        $_SESSION["cart"][$index]=$item;
                                    
                                       echo "<script>window.open('cart_item.php','_self');</script>";
                                }
                                }else{
                                    $item=array(
                                        "pid"=>$_POST["pid"],
                                        "pname"=>$_POST["pname"],
                                        "prate"=>$_POST["prate"],
                                        "pimg"=>$_POST["pimg"],
                                        "qty"=>$_POST["qty"]
                                    );
                                    // echo "<pre>";
                                    // print_r($item);
                                    // echo "</pre>";
                                    $_SESSION["cart"][0]=$item;
                                    //   echo "<pre>";
                                    // print_r($_SESSION["cart"]);
                                    // echo "</pre>";
                                    echo "<script>window.open('cart_item.php','_self');</script>";
    
                                }
                               
                            }

                        ?>
                        <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post"
                     enctype="multipart/form-data" >   
                            <div class="col-md-6">
                                <label for="">qty</label>
                                <input type="hidden" name="pimg" value="<?php echo $r["PIMG"]; ?>">   
                                <input type="number" name="qty" class="form-control" value="1">  
                                <input type="hidden" name="pid" value="<?php echo $_GET["id"]; ?>">
                                <input type="hidden" name="pname" value="<?php echo $r["PNAME"]; ?>">
                                <input type="hidden" name="prate" value="<?php echo $r["PRATE"]; ?>">
                                 
                            </div>
                            <div class="col-md-6">
                            <button type="submit" name="addcart" class="btn btn-success">Add to cart</button> 
                            </div>
                        </form>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h4>More Details of Product</h4>
                
                    <h5>Features</h5>
                    <?php 
                        $sql="SELECT * FROM pro_fus";
                        $res=$con->query($sql);
                        if($res->num_rows>0){
                            echo'<table class="table table-bordered">';
                            while($fus=$res->fetch_assoc()){
                        ?>
                            <tr>
                                <th><?php echo $fus["FTIT"]; ?></th>
                                <th><?php echo $fus["FUS"]; ?></th>
                            </tr>
                            
                         <?php
                            }
                            echo '</table>';
                        } 
                    ?>
                </div>        
            
                
                
                    <h5>Comments</h5>
                <?php 
                 $sql="SELECT * FROM pro_img";
                 $res=$con->query($sql);
                 if($res->num_rows>0){
                     while($rimg=$res->fetch_assoc()){
                 
                 }
             }

                    $sql="SELECT c.CNID,c.RID,c.PID,r.FNAME,c.CMNT FROM cmt c
                        INNER JOIN register r ON c.RID=r.RID";
                        $res=$con->query($sql);
                        if($res->num_rows>0){
                            while($r=$res->fetch_assoc()){
                        ?>
                        <div class="media">
                            <div class="media-left">
                                <img src="<?php echo $rimg["SIMG"]; ?>" class="media-object"
                                style="width:60px">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $r["FNAME"];?></h4>
                        <p><?php echo $r["CMNT"]; ?></p>
                            </div>
                            </div>
                        <?php
                        }
                    }
                ?>
                <div class="col-md-6">
                    <?php      
                        if(isset($_POST["send"])){
                        $cmnt=$_POST["cmnt"];
                        if(isset($_SESSION["rid"])){
                        $sql="INSERT INTO cmt(PID,RID,CMNT) VALUES('{$_GET["id"]}','{$_SESSION["rid"]}',
                        '{$cmnt}')";
                        if($con->query($sql)){
                            echo"<div class='alert alert-success'><span class='fa fa-check text-success'></span> send success</div>";
                        }
                        else{
                            echo"<div class='alert alert-danger'>send Failed</div>";
                            }
                        }else{
                        echo '<script>alert("please login before add your"):
                            window.open("login.php","_self")</script>';
                            }
                        } 
                        else{
                            echo 'Record Not Found';
                        }
                    ?>
                    <form action="<?php echo $_SERVER ["REQUEST_URI"] ?>" method="post" 
                        autocomplete="off" enctype="multipart/form-data">
                        <div class="form-group">
                            <textarea name="cmnt" class="form-control" id="" cols="40" rows="2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger" name="send">Send</button>
                    </form>                        
                    </div>
                </div>                              
            </div>         
        </div>
        <script>
            $("document").ready(function(){
                $("#fav").click(function(){
                    var p="<?php echo $_GET["id"] ?>";
                    var r="<?php echo $_SESSION["rid"] ?>";
                    $.post("savefav.php",{rid:r,pid:p},function(data){
                        $("#out").html(data).css("color","green");
                    });
                });
                $(".fas").click(function(){
                    var rt=Number($(this).attr("id"));
                    var p="<?php echo $_GET["id"] ?>";
                    var r="<?php echo $_SESSION["rid"] ?>";
                   // alert(rt);
                    for(var i=1;i<=5;i++){
                        $("#"+i).css("color","#808080")
                       }
                    for(var i=1;i<=rt;i++){
                        $("#"+i).css("color","#ffb300")
                    }
                    $.post("saverat.php",{rid:r,pid:p,rate:rt},function(data){
                        for(var i=1;i<=5;i++){
                            $("#"+i).prop('disabled',true);
                        }
                
                    });    
                });
            });
        </script>
        
</body>
</html>

