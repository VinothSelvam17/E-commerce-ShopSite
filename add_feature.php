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
                    <li class="breadcrumb-item"><a href="#">Add Feature</a></li>
                     <li class="breadcrumb-item"><a href="add_image.php?pid=<?php echo 
                     $_GET["pid"]; ?>">Side Images</a></li>
                </div>
                <div class="col-md-7">
                    <form action="<?php echo $_SERVER ["REQUEST_URI"] ?>" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        <div class="col-md-12 form-group">
                        <label>No of rows</label>
                        <input type="text" class="form-control" id="nor">
                    </div>
                        <div class="col-md-12">
                        <button type="button" class="btn btn-success" 
                            id="addrow">Add Rows</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <table class="col-md-8 table table-board">
                        <thead>
                        <th>SNO</th>
                        <th>TITLE</th>
                        <th>FEATURES</th>
                        </thead>                   
                        <tbody id="tblbody">
                            
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-info mt-md-4" 
                        id="savefus">Save Features</button>
                        <h4 style="margin-top:30px">Features Details</h4>
                        <table class="table table-bordered">
                        <thead>
                            <th>SNO</th>
                            <th>TITLE</th>
                            <th>FEATURES</th>
                            <th>DELETE</th>                      
                        </thead>
                        <tbody>
                            <?php 
                                $sql="SELECT TID,FTIT,FUS FROM pro_fus where PID={$_GET["pid"]}";
                                $res=$con->query($sql);
                                if($res->num_rows>0){
                                    $i=0;
                                    while($r=$res->fetch_assoc()){
                                        $i++;
                                ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $r["FTIT"]; ?></td>
                                <td><?php echo $r["FUS"]; ?></td>  
                                <td><a href="fus_delete.php?id=<?php echo $r["TID"]; ?>&pid=<?php echo $_GET["pid"]; ?>"
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
            <div class="col-md-4">
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
    </div>
    <script>
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
                    $.post("savefus.php",{pid:p,ftit:t,fes:f},function(data){
                      //  alert(data);
                     });
                });
                 alert("Features Added");
                 location.reload();
            });
        });
    </script>
</body>
</html>