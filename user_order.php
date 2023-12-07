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
                    <th>Rate</th>
                    <th>View</th>
                    <th>Status</th>
                </thead>
                <tbody>
                <?php 
                // echo $sql="SELECT r.RID,o.RID,o.ORNO,r.FNAME,r.PNO FROM orders r
                //   INNER JOIN register ON o.RID=r.RID WHERE RID={$_SESSION["rid"]}";
                // echo $sql="SELECT r.RID,r.FNAME,o.RID,o.ORNO,o.RATE FROM register r INNER JOIN 
                //     orders o ON r.RID=o.RID WHERE RID={$_SESSION["rid"]}";
            //    echo $sql="SELECT * FROM register r INNER JOIN orders o ON r.RID=o.RID"; 
            //  "  WHERE RID={$_SESSION["rid"]}";
            $sql="SELECT * FROM orders WHERE RID={$_SESSION["rid"]}";
                    $res=$con->query($sql);
                    if($res->num_rows>0){
                       $i=0;
                        while($rs=$res->fetch_assoc()){
                            $i++;

                    ?>
                      <?php 
                        $sql="SELECT * FROM register";
                        $res=$con->query($sql);
                        if($res->num_rows>0){
                        $i=0;
                        while($r=$res->fetch_assoc()){
                            $i++;

                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $rs["ORNO"]; ?></td>
                            <td><?php echo $r["FNAME"]; ?></td>
                            <td><?php echo $rs["RATE"]; ?></td>
                            <td><a href="my_orders.php?rid=<?php echo $rs["OID"]; ?>"
                            class="btn btn-danger btn-xs">Order
                        </a></td>
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
</body>
</html>
