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
    <div class="container-fluid">
    <div class="row">
            <div class="col-md-12">
            <div class="row">
                <?php
                    $sql="SELECT * FROM product ";
                    $res=$con->query($sql);
                    if($res->num_rows>0){
                        $i=0;
                        while($r=$res->fetch_assoc()){
                        $i++;
                ?>   
                <div class="col-md-3 mt-4" style="text-align:center; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">       
                    <div class="card">
                        <img src="<?php echo $r["PIMG"]; ?> "
                        class="card-img" height="300px" width="auto">   
                        <th><h6 class="mt-3 text-secondary" style="font-size:20px; font-weight:600;">Product :</th>
                        <?php echo $r["PNAME"]; ?></h6>
                        <th><h6 class="text-secondary" style="font-size:18px; font-weight:600;">Rate:</th>
                        <?php echo $r["PRATE"]; ?></h6>
                        <a href="see_more.php?id=<?php echo $r["PID"]; ?>"
                        class="btn btn-warning">See More</a>
                    </div>
                </div>
                <?php }
                    }
                    else
                    {
                        echo "Record not found";
                    }
                ?>
            </div>          
        </div>
    </div>
        
        </div>
    </body>
</html>