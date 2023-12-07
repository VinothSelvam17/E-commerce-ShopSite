<?php 
    include "config.php";
    session_start();

$sql="SELECT c.CNAME,p.* FROM product p INNER JOIN category c ON p.CID=
    c.CID WHERE p.PID='{$_GET["pid"]}'";
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
            <div class="col-md-9"><br>
                <h4>Product Description</h4>
                <div class="breadcrumb">
                     <li><a href="add_feature.php?pid=<?php echo 
                     $_GET["pid"]; ?>">Add Features</a></li>
                    <li><a href="add_side.php?pid=<?php echo 
                     $_GET["pid"]; ?>">Add Images</a></li>
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
                    <div class="col=md-12">
                    <table class="col-md-8 table table-board">
                        <thead>
                            <th>SNO</th>
                            <th>DESCRIPTION</th>
                            <th>FEATURES</th>
                        </thead>
                        <tbody id="tblbody">

                        </tbody>
                    </table>
                    <br>
                    <button type="button" class="btn btn-info mt-md-4" 
                      id="savedes">Save Description</button>
                     <h4 style="margin-top:30px">Description Details</h4>
                    <table class="table table-bordered">
                    <thead>
                        <th>SNO</th>
                        <th>DESCRIPTION</th>
                        <th>DELETE</th>
                    </thead>
                    <tbody>
                    <?php 
                        $sql="SELECT PDID,PDES,PFUS FROM pro_des";
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
                        <td><a href="des_delete.php?id=<?php echo $r["PDID"]; ?>&pid=
                        <?php echo $_GET['pid']; ?>"
                                class="btn btn-danger btn-xs">Delete</a></td>
                    </tr>
                    <?php 
                            }
                        }else{
                            echo 'Record Not Found';
                        } ?>
                    </tbody>
                    </table>
                </div>
                    </div>
                    <div class="col-md-5">
                    <table class="table eable_bordered">
                        <tr><th>Product Category</th><td><?php echo $r["CNAME"];?></td></tr>
                            <tr><th>Product Name</th><td><?php echo $r["PNAME"];?></td></tr>
                            <tr><th>Product Rate</th><td><?php echo $r["PRATE"];?></td></tr>
                            <tr><td colspan="2"><img src="<?php echo $r["PIMG"];?>"
                            class="img-responsive"></td></tr>
                
                    </table>
                </div>
            </div>
        </div>
        <script src="js/jquery.min.js"></script>
            <script>
                $("document").ready(function(){
                    $("#addrow").click(function(){
                        var n=$("#nor").val();
                        var des="";
                        for(var i=1;i<=n;i++)
                        {
                         des+=`
                         <tr class="drows">
                            <td>${i}</td>
                            <td class="des_data" contenteditable="true"></td>
                         </tr>
                         `;
                            
                        }
                        $("#dblbody").html(des);
                    });
                    $("#savedes").click(function(){
                        var p="<?php echo $_GET["pid"]; ?>";
                        var f="<?php echo $_GET["pid"]; ?>";
                        $(".drows").each(function(){
                            var d=$(this).find(".des_date").text();
                            var d=$(this).find(".fus_date").text();
                            $.post("savedes.php",{pid:p,des:d,fus:f},function(data){
                                
                        });
                        alert("Description Added");
                        location.reload();
                    )};
                });
            </script>
    </body> 
</html>