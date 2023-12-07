<?php 
    include "config.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "head.php" ?>
</head>
<body>
<?php require_once "navbar.php";?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            <div class="col-md-9">
                <h4>Retailer Details</h4><hr>
                <table class="table table-bordered">
                <thead>
                    <th>SNO</th>
                    <th>Name</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Pno</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                <?php 
                    $sql="SELECT RID,RNAME FROM retiler";
                    $res=$con->query($sql);
                    if($res->num_rows>0){
                        $i=0;
                        while($r=$res->fetch_assoc()){
                            $i++;

                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $r["RNAME"]; ?></td>
                            <td><a href="cate_delete.php?id=<?php echo $r["RID"]; ?>"
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
</body>
</html>