<?php 
    include "config.php";
    session_start();
    
    
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <?php include "head.php";?>
</head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
<body>    
    <?php require_once "navbar.php";?>
<div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include "sidebar.php"; ?>
            </div>
            <div class="col-md-9">
                <table class="table table-boredered">
                    <thead>
                    <th>SNO</th>
                    <th>PID</th>
                    <th>COMMENT</th>
                    <th>DELECT</th>
                    </thead>
                    <tbody>
                    <?php 
                    $sql="SELECT CNID,PID,CMNT FROM cmt WHERE RID={$_SESSION["rid"]}";
                    $res=$con->query($sql);
                    if($res->num_rows>0){
                        $i=0;
                        while($r=$res->fetch_assoc()){
                            $i++;

                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $r["PID"]; ?></td>
                            <td><?php echo $r["CMNT"]; ?></td>
                            <td><a href="cmt_delete.php?id=<?php echo $r["CNID"]; ?>"
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
