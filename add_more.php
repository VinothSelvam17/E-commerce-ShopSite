<?php 
    include "config.php";
    session_start();

$sql="SELECT c.CNAME,p.* FROM product p INNER JOIN category c ON p.CID=
    c.CID WHERE p.PID='{$_GET["pid"]}'";
    $res=$con->query($sql);
    if($res->num_rows>0){
        $pro=$res->fetch_assoc();
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
            <div class="col-md-5 mt-2" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                <h4>Product Description</h4><hr>
                <div class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Add Description</a></li>
                    <li class="breadcrumb-item"><a href="add_feature.php?pid=<?php echo 
                     $_GET["pid"]; ?>">Add Feature</a></li>
                     <li class="breadcrumb-item"><a href="add_image.php?pid=<?php echo 
                     $_GET["pid"]; ?>">Side Images</a></li>
                </div>
                <div class="col-md-7">
                    <form action="<?php echo $_SERVER ["REQUEST_URI"] ?>" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        <div class="col-md-12 form-group">
                        <label>No of rows</label>
                        <input type="text" class="form-control" placeholder="Enter a number" id="nor">
                    </div>
                        <div class="col-md-12">
                        <button type="button" class="btn btn-success mb-2" 
                            id="addrow">Add Rows</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <table class="col-md-8 table table-board">
                        <thead>
                        <th>SNO</th>
                        <th>DESCRIPTION</th>
                        <th>FEATURES</th>
                        </thead>                   
                        <tbody id="tblbody">
                            
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-info mt-md-4" 
                        id="savedes">Save Description</button>
                        <h4 style="margin-top:30px">Description Details</h4>
                    <table class="table table-bordered">
                        <thead>
                            <th>SNO</th>
                            <th>DESCRIPTION</th>
                            <th>FEATURES</th>
                            <th>DELETE</th>                      
                        </thead>
                        <tbody>
                            <?php 
                                $sql="SELECT PDID,PDES,PFUS FROM pro_des where PID={$_GET["pid"]}";
                                $res=$con->query($sql);
                                if($res->num_rows>0){
                                    $i=0;
                                    while($r=$res->fetch_assoc()){
                                        $i++;
                                ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $r["PDES"]; ?></td>
                                <td><?php echo $r["PFUS"]; ?></td>  
                                <td><a href="des_delete.php?id=<?php echo $r["PDID"]; 
                                ?>&pid=<?php echo $_GET["pid"]; ?>"
                                    class="btn btn-danger btn-xs">Delete</a></td>
                            </tr>
                            <?php 
                                    }
                                }else{
                                    echo 'Record Not Found';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4 mt-2" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                    <table class="table table-bordered">
                        <div style="text-align:center;"><h4>Your Ordered Product</h4></div>
                        <hr>
                        <tr><th>Product Category</th><td><?php echo $pro["CNAME"];?></td></tr>
                        <tr><th>Product Name</th><td><?php echo $pro["PNAME"];?></td></tr>
                        <tr><th>Product Rate</th><td><?php echo $pro["PRATE"];?></td></tr>
                        <tr><td colspan="2"><img class="img-fluid" src="<?php echo $pro["PIMG"];?>"
                        class="img-responsive"></td></tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <script>
        $("document").ready(function(){
            $("#addrow").click(function(){
                var n=$("#nor").val();
                var des="";
                var fus="";
                for(var i=1;i<=n;i++)
                {
                    des+=`
                        <tr class="drows">
                        <td>${i}</td>
                        <td class="des_data" contenteditable="true"></td>
                        <td class="fus_data" contenteditable="true"></td>
                        </tr>
                    `;
                }
                $("#tblbody").html(des,fus);
            });
            $("#savedes").click(function(){
                var p="<?php echo $_GET["pid"]; ?>";
                $(".drows").each(function(){
                    var d=$(this).find(".des_data").text();
                    var f=$(this).find(".fus_data").text();
                    $.post("savedes.php",{pid:p,des:d,fus:f},function(data){
                        //alert(data);
                     });
                });
                 alert("Description Added");
                 location.reload();
            });
        });
    </script>
</body>
</html>