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
            <div class="col-md-9" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                <h4 class="mt-2">Order Detials</h4><hr>
                <table class="table table-bordered">
                <thead>
                    <th>SNO</th>
                    <th>OrderNO</th>
                    <th>User</th>
                    <th>Phone_No</th>
                    <th>View</th>
                    <th>Status</th>
                </thead>
                <tbody>
                <?php 
                 $sql="SELECT r.RID,o.RID,o.ORNO,r.FNAME,r.PNO,o.STATUS FROM register r
                  INNER JOIN orders o ON r.RID=o.RID";
                    $res=$con->query($sql);
                    if($res->num_rows>0){
                       $i=0;
                        while($rs=$res->fetch_assoc()){
                            $i++;

                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $rs["ORNO"]; ?></td>
                            <td><?php echo $rs["FNAME"]; ?></td>
                            <td><?php echo $rs["PNO"]; ?></td>
                            <td><a href="my_orders.php?rid=<?php echo $rs["RID"]; ?>"
                            ><button class="ebtn">Order</button></a></td>
                            <td><?php  if($rs["STATUS"]==0){
                             ?>
                                <h6 class="text-info">Order Pending...</h6>
                                <?php } else { ?>
                                    <h6 class="text-success">Order Placed...</h6>
                            <?php } ?>
                                </td>
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
