<?php 
    include "config.php";
    session_start(); 
    $sql="SELECT o.ORNO,r.FNAME,r.PNO,o.STATUS FROM register r INNER JOIN orders o ON r.RID=o.RID";
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
            <div class="col-md-12"><br>
                <h4>Welcome To Cart</h4>
                <table class="table table-bordered" id="cartTable">
                    <thead>
                        <th>Product Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </thead>
                    <tbody>
                        <?php
                            $total=0;
                            foreach($_SESSION["cart"] as $key=>$value){
                                $amt=$value["prate"]*$value["qty"];
                                $total+=$amt;
                        ?>
                            <tr>
                                <td><img src="<?php echo $value["pimg"]; ?>"
                                height="65px" width="65px"></td>
                                <td><?php echo $value["pname"]; ?></td>
                                <td><input type="text" class="form-control rate"
                                value="<?php echo $value["prate"]; ?>" readonly></td>
                                <td>
                                <div class="qtybox" style="display:flex;">
                                    <button type="button" class="btn btn-success btn-sm btnplus">
                                        + </button>
                                        <input type="text" class="form-control qty"
                                        value="<?php echo $value["qty"]; ?>" >
                                        <input type="hidden" class="form-control pid"
                                        value="<?php echo $value["pid"]; ?>">
                                        <button type="button" class="btn btn-info btn-sm btnmins">-</button>
                                    
                                </div>
                                </td>
                                <td><input type="text" class="form-control amt" readonly value="<?php echo 
                                    $amt; ?>">
                                     </td>
                                    <td><a href="removecart.php?pid=<?php echo $value["pid"]; ?>" class="btn
                                    btn-danger"><i class="fa fa-trash"></i>
                                    </td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                Grand total
                            </td>
                            <td>
                                <input type="text" value="<?php echo $total; ?>"
                                id="gtotal" readonly class="form-control">
                            </td>
                        </tr>
                    </tfoot>        
                </table>
                <br>
                <a href="pro_add.php" class="btn btn-warning">Continue Shopping</a>
                <button type="button" class="btn btn-success" id="placeorder">Place Order</button>
                </div>
                </div>
            </div>
            <script>
                $("document").ready(function(){
                    pro_amt();
                    grand_amt();
                    $("body").on("keyup keypress blur change",".qty",function(){
                        pro_amt();
                        grand_amt();
                        updateSession();
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
                    var qtyplus=$(".btnplus");
                    var qtymins=$(".btnmins");
                    //increase qty

                    var incqty=qtyplus.click(function(){
                        $n=$(this).parent(".qtybox").find(".qty");
                        $n.val(Number($n.val())+1);
                        pro_amt();
                        grand_amt();
                        updateSession();
                    });
                    var decqty=qtymins.click(function(){
                        $n=$(this).parent(".qtybox").find(".qty");
                        if($n.val()>1){
                            $n.val(Number($n.val())-1);
                        }
                        pro_amt();
                        grand_amt();
                        updateSession();
                    });
                    function updateSession(){
                        $("#cartTable > tbody > tr").each(function(){
                            var qty=Number($(this).find(".qty").val());
                            var pid=Number($(this).find(".pid").val());
                            $.post("updateSession.php",{pid:pid,qty:qty},function(){

                            });
                 
                    });
                }
                $("#placeorder").click(function(){
                    $.post("place_order.php",function(data){
                        alert(data);
                        location.reload();
                    });
                });
            });
            </script>
    </body>
</html>