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
                <h4 style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:25px;" class="mt-2">Users Details</h4><hr>
                <table class="table table-bordered" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:18px;">
                <thead>
                    <th>SNO</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Profile</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                <?php 
                    $sql="SELECT RID,FNAME,EMAIL,CONCAT(CITY,',<br>',PNO) AS CITY,RIMG FROM
                    register";
                    $res=$con->query($sql);
                    if($res->num_rows>0){
                        $i=0;
                        while($r=$res->fetch_assoc()){
                            $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $r["FNAME"]; ?></td>
                            <td><?php echo $r["EMAIL"]; ?></td>
                            <td><?php echo $r["CITY"]; ?></td>
                            <td><img src="<?php echo $r["RIMG"]; ?>" height="80" width="100" class="thumbnail"></td>
                            <td><a href="user_delete.php?id=<?php echo $r["RID"]; ?>"
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
    </div>
</body>
</html>








