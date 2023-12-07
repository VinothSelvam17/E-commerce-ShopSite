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
    <div class="container" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:17px;">
        <div class="row">
            <div class="col-md-3">
                <?php include "sidebar.php"; ?>
            </div>
            <div class="col-md-5 cadd">
                <?php   
                if(isset($_POST["btn3"])){
                    $cname=$_POST["cname"];
                    $sql="INSERT INTO category(CNAME) VALUES('$cname')";
                    if($con->query($sql)){
                        echo"<div class='alert alert-success'><span class='fa fa-check text-success'></span> Registration success</div>";
                    }
                    else{
                        echo"<div class='alert alert-danger'>Registration Failed</div>";
                    }
                    }
                ?>
                <form action="<?php echo $_SERVER ["REQUEST_URI"] ?>"
                class="bg-primary p-3 mt-3" style="border-radius:3px;" method="post" autocomplete="off">
                <label class="text-white">ADD CATEGORY</label>
                <input type="text" placeholder="Enter category"  name="cname">
                <button type="submit" name="btn3">ADD</button>
                </form>
            </div>
        <div class="col-md-3">
            <table class="table table-bordered">
                <thead style="text-align:center; font-size:20px;">
                    <th colspan="4px" class="text-primary" >Your Category List</th>
                </thead>
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
                            <td><a href="edit.php?id=<?php echo $r["CID"]; ?>"
                            ><button class="ebtn">Edit</button></a></td>
                            <td><a href="cate_delete.php?id=<?php echo $r["CID"]; ?>"
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