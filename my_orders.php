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
                <h4>ORDER_Detial</h4><hr>
                <table class="table table-bordered" id="#cartTable">
                <thead>
                    <th>SNO</th>
                    <th>Product_img</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>TOTAL</th>
                </thead>
                <tbody>
                
                <?php 
                 $sql="SELECT p.PIMG,p.PNAME,o.QTY,O.RATE FROM product p 
                 INNER JOIN orders o ON p.PID=o.PID";
                    $res=$con->query($sql);
                    if($res->num_rows>0){
                       $i=0;
                        while($r=$res->fetch_assoc()){
                            $i++;
                    ?>
                    <?php
                            $total=0;  
                                $amt=$r["RATE"]*$r["QTY"];
                                $total+=$amt;
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><img 
                            height="100" width="100" src="<?php echo $r["PIMG"]; ?>" alt=""></td>
                            <td><?php echo $r["PNAME"]; ?></td>
                            <td><input type="text" class="form-control qty"
                                        value="<?php echo $r["QTY"]; ?>"></td>        
                            <td><input type="text" class="form-control rate"
                                        value="<?php echo $r["RATE"]; ?>"></td>
                            </td>
                                <td><input type="text" class="form-control amt" readonly 
                                value="<?php echo $amt; ?>">
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
                <tfoot>
                        <tr>
                            <td colspan="5">
                                Grand total
                            </td>
                            <td>
                                <input type="text" value="<?php echo $total; ?>"
                                id="gtotal" readonly class="form-control">
                            </td>
                        </tr>
                    </tfoot>   
            </table>
        </div>
    </div>
    <script>
        $("document").ready(function(){
            pro_amt();
                grand_amt();
                $("body").on("keyup keypress blur change",".qty",function(){
                     pro_amt();
                    grand_amt();
                });
                function pro_amt(){
                    $("#cartTable > tbody > tr").each(function(){
                        var qty=Number($(this).find(".qty").val());
                        var prate=Number($(this).find(".rate").val());
                            $(this).find(".amt").val(qty*prate);
                        });
                    }
                    function grand_amt(){
                        var total=0;
                        $(".amt").each(function(){
                            var amt=Number($(this).val());
                           // alert(amt);
                            total+=amt;
                        });
                        $("#gtotal").val(total);
                    }
                });  
            </script>
</body>
</html>