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
            <div class="col-md-9">
                <h4>Retiler_Detial</h4><hr>
                <table class="table table-bordered">
                <thead>
                    <th>SNO</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>City</th>
                    <th>Pincode</th>
                    <th>phone_no</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                <?php 
                    $sql="SELECT REID,RCODE,RNAME,RMAIL,RCOM,RCITY,RPIN,RPNO FROM retiler";
                    $res=$con->query($sql);
                    if($res->num_rows>0){
                        $i=0;
                        while($r=$res->fetch_assoc()){
                            $i++;

                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $r["RCODE"]; ?></td>
                            <td><?php echo $r["RNAME"]; ?></td>
                            <td><?php echo $r["RMAIL"]; ?></td>
                            <td><?php echo $r["RCOM"]; ?></td>
                            <td><?php echo $r["RCITY"]; ?></td>
                            <td><?php echo $r["RPIN"]; ?></td>
                            <td><?php echo $r["RPNO"]; ?></td>
                            <td><a href="retiler_edit.php?id=<?php echo $r["REID"]; ?>"
                            ><button class="ebtn">Edit</button></a></td>
                            <td><a href="retiler_delete.php?id=<?php echo $r["REID"]; ?>"
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
