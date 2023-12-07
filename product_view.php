<?php 
    include "config.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include "head.php" ?>
    <title>Document</title>
</head>
<body>
<?php require_once "navbar.php";?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include_once "sidebar.php"?>
            </div>
            <div class="col-md-9 mt-2" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                <h4>Product Details</h4><hr>
                <table class="table table-bordered">
                <thead>
                    <th>SNO</th>
                    <th>category Name</th>
                    <th>product Name</th>
                    <th>Rate</th>
                    <th>PIMG</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                <?php 
                     $sql="SELECT c.CNAME,p.* FROM product p INNER JOIN category c ON 
                    p.CID=c.CID";  
                    $res=$con->query($sql);
                    if($res->num_rows>0){
                        $i=0;
                        while($r=$res->fetch_assoc()){
                            $i++;

                         ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $r["CNAME"]; ?></td>
                            <td><?php echo $r["PNAME"]; ?></td>
                            <td><?php echo $r["PRATE"]; ?></td>
                            <td><img src="<?php echo $r["PIMG"]; ?> "
                            height="80" width="95" class="class-thumbnail" ></td>
                            <td><a href="product_edit.php?id=<?php echo $r["PID"]; ?>"
                            ><button class="ebtn">Edit</button></a></td>
                            <td><a href="product_delete.php?id=<?php echo $r["PID"]; ?>"
                            ><button class="dbtn">Delete</button></a></td>
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
</body>
</html>