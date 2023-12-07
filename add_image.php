<?php 
    include "config.php";
    session_start();

$sql="SELECT c.CNAME,p.* FROM product p INNER JOIN category c ON p.CID=
    c.CID WHERE p.PID='{$_GET["pid"]}'";
    $res=$con->query($sql);
    if($res->num_rows>0){
        $f=$res->fetch_assoc();
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
            <div class="col-md-5">
                <h4>Product Features</h4>
                <div class="breadcrumb">
                     <li class="breadcrumb-item"><a href="add_more.php?pid=<?php echo 
                     $_GET["pid"]; ?>">Add Description</a></li>
                   <li class="breadcrumb-item"><a href="add_feature.php?pid=<?php echo 
                     $_GET["pid"]; ?>">Add Feature</a></li>
                     <li class="breadcrumb-item"><a href="#">Side Images</a></li>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php 
                            if(isset($_POST["imgbtn"])){
                                $out_mes="";
                                $img_folder="products/sideimg/";
                                $extensions=array("jpg","png","jpeg");
                                foreach($_FILES["img"]["tmp_name"] as $key=>$values){
                                    $filename=$_FILES["img"]["name"][$key];
                                    $tmp_location=$_FILES["img"]["tmp_name"][$key];
                                    $upload_format=pathinfo($filename,PATHINFO_EXTENSION);
                                    // $final_img_name=$new;
                                    if(in_array($upload_format,$extensions)){
                                        if(!file_exists($img_folder.$filename)){
                                            move_uploaded_file($tmp_location,$img_folder.$filename);
                                            $final_img_name=$filename;
                                        }else{
                                            $filename=str_replace(".","-",basename($filename,$upload_format));
                                            $new=$filename.time().".".$upload_format;
                                            move_uploaded_file($tmp_location,$img_folder.$new);
                                            $final_img_name=$new;
                                        }
                                        $sql="INSERT INTO pro_img(PID,SIMG) VALUES('{$_GET["pid"]}',
                                        '{$final_img_name}')";
                                        if($con->query($sql)){
                                            $out_mes="upload Success";
                                        }else{
                                            $out_mes="upload Failed";
                                        }
                                    }else{
                                        $out_mes="Invalid Images Format";
                                    }
                                }
                                if($out_mes!=""){
                                    echo "<div class='alert alert-info'>{$out_mes}<div>";
                                }
                            }
                            
                        ?>
                        <form action="<?php echo $_SERVER ["REQUEST_URI"] ?>" method="post" autocomplete="off"
                        enctype="multipart/form-data">                        
                        <div class="col-md-12 form-group">
                            <label>Images</label>
                            <input type="file" class="form-control" name="img[]" multiple>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success" 
                            name="imgbtn" style="margin-bottom:30px">Add Images</button>
                        </form>                            
                    </div>
                    <?php
                            if(isset($_POST["delbtn"])){
                            $piid=$_POST["cimg"];
                            $mes=0;
                            for($i=0;$i<sizeof($piid);$i++){
                                $sql="delete from pro_img where PIID={$piid[$i]}";
                                if($con->query($sql)){
                                    $mes=1;
                                }
                            }
                            if($mes==1){
                                echo "<script>alert('Images Deleted')</script>";
                            }
                        }
                        ?>
                        <div class="col-md-12">
                            <form action="<?php echo $_SERVER ["REQUEST_URI"] ?>" method="post" autocomplete="off"
                                enctype="multipart/form-data">
                                <div class="row">
                                    <?php
                                        $sql="select * from pro_img where PID={$_GET["pid"]}";
                                        $sres=$con->query($sql);
                                        if($sres->num_rows>0){
                                            while($side=$sres->fetch_assoc()){
                                    ?>
                                    <div class="col-md-6">
                                        <input type="checkbox" name="cimg[]"
                                        value="<?php
                                        echo $side["PIID"]; ?>">
                                        <img src="products/sideimg/<?php echo $side["SIMG"]; ?>" 
                                        class="img-fluid" height="100" alt="">   
                                    </div><br style="clear:both">
                                        
                                    <?php
                                            }
                                        }
                                    ?>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-danger" 
                                        name="delbtn" style="margin:10px 0px ;">Delete Images</button>
                                    </div>
                                </div>
                            </form>
                        </div>                
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-mt-10px">
                <table class="table table_bordered">
                <tr><th>Product Category</th><td><?php echo $f["CNAME"];?></td></tr>
                <tr><th>Product Name</th><td><?php echo $f["PNAME"];?></td></tr>
                <tr><th>Product Rate</th><td><?php echo $f["PRATE"];?></td></tr>
                <tr><td colspan="2"><img class="img-fluid" src="<?php echo $f["PIMG"];?>"
                class="img-responsive"></td></tr>
                </table>
            </div>
            
        </div>
    </div>
    <!-- <script>
        $("document").ready(function(){
            $("#addrow").click(function(){
                var n=$("#nor").val();
                var ftit="";
                var fes="";
                for(var i=1;i<=n;i++)
                {
                    ftit+=`
                        <tr class="frows">
                        <td>${i}</td>
                        <td class="ftit_data" contenteditable="true"></td>
                        <td class="fes_data" contenteditable="true"></td>
                        </tr>
                    `;
                }
                $("#tblbody").html(ftit,fes);
            });
            $("#savefus").click(function(){
                var p="<?php echo $_GET["pid"]; ?>"
                $(".frows").each(function(){
                    var t=$(this).find(".ftit_data").text();
                    var f=$(this).find(".fes_data").text();
                    $.post("savedfus.php",{pid:p,ftit:t,fes:f},function(data){
                    
                     });
                });
                 alert("Features Added");
                 location.reload();
            });
        });
    </script> -->
</body>
</html>

