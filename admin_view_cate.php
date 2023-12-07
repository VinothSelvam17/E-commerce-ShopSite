<?php 
    include "config.php";
    session_start();
    if(!isset($_SESSION["aid"])){
        echo '<script>alert("Accesss Donied..Please Login");window.open("shop_site.php","_self")</script>';

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
            <div class="col-md-9">
                <h4>Category Details</h4><hr>
                <table class="table table-bordered">
                <thead>
                    <th>SNO</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                <?php 
                    $sql="SELECT CID,CNAME FROM category";
                    $res=$con->query($sql);
                    if($res->num_rows>0){
                        $i=0;
                        while($r=$res->fetch_assoc()){
                            $i++;

                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $r["CNAME"]; ?></td>
                            <td><a href="cate_edit.php?id=<?php echo $r["CID"]; ?>"
                            class="btn btn-danger btn-xs">Edit</a></td>
                            <td><a href="cate_delete.php?id=<?php echo $r["CID"]; ?>"
                            class="btn btn-danger btn-xs">Delete</a></td>
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
</body>
</html>
