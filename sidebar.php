<?php if(isset($_SESSION["aid"]))
    { ?>
    <!-- <ul>
    <li class="nav-item"><a href="admin_home.php"></a></li>
    </ul> -->
        <h4 class="mt-2" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:25px;">Dashbord</h4><hr>
        <ul class="list_group div" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:17px;">
            <li class="list-group-item"><a href="admin_home.php"><button>Home</button></a></li>
            <li class="list-group-item"><a href="admin_view_users.php"><button>Users</button></a></li>
            <li class="list-group-item"><a href="category.php"><button>Category</button></a></li>
            <li class="list-group-item"><a href="retiler.php"><button>Add Retailer</button></a></li>
            <li class="list-group-item"><a href="admin_view_retiler.php"><button>View Retailer</button></a></li>
            <!-- <li class="list-group-item"><a href="product.php"><button>Add Products</button></a></li> -->
            <li class="list-group-item"><a href="product_view.php"><button>View Products</button></a></li>
            <li class="list-group-item"><a href="view_order.php"><button>Orders</button></a></li>
        </ul>
        <?php }
        else if(isset($_SESSION["reid"]))
        { ?>
            <h4 style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:25px;" class="mt-2" >Dashbord</h4><hr>
            <ul class="list_group div" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:17px;">
                <li class="list-group-item"><a href="retiler_home.php?id=<?php echo $_SESSION["reid"]; ?>"><button>Home</button></a></li>
                <!-- <li class="list-group-item"><a href="admin_home.php"><button>Home</button></a></li> -->
                <li class="list-group-item"><a href="view_retiler.php?id=<?php echo $_SESSION["reid"]; ?>"><button>View Profile</button></a></li>
                <li class="list-group-item"><a href="product.php"><button>Add Products</button></a></li>
                <li class="list-group-item"><a href="product_view.php"><button>View Products</button></a></li>
                <li class="list-group-item"><a href=""><button>Offer Products</button></a></li>
                <li class="list-group-item"><a href="view_order.php"><button>Orders</button></a></li>
            </ul>
        <?php }
        else
        { ?>
            <!-- <li class="nav-item"><a href="user_home.php"></a></li>         -->
            <h4 style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:25px;" class="mt-2">Dashbord</h4><hr>
            <ul class="list_group div" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-size:17px;">
                <li class="list-group-item"><a href="user_home.php?id=<?php echo $_SESSION["rid"]; ?>"><button>Home</button></a></li>
                <li class="list-group-item"><a href="img_update.php?id=<?php echo $_SESSION["rid"];?>"><button>View Profile</button></a></li>
                <li class="list-group-item"><a href="pro_update.php?id=<?php echo $_SESSION["rid"]; ?>"><button>Profile Update</button></a></li>
                <li class="list-group-item"><a href="update_reg.php?id=<?php echo $_SESSION["rid"]; ?>"><button>Image Update</button></a></li>
                <li class="list-group-item"><a href="user_order.php?id=<?php echo $_SESSION["rid"];?>"><button>My Orders</button></a></li>
                <li class="list-group-item"><a href="comment.php?id=<?php echo $_SESSION["rid"]; ?>"><button>Comments</button></a></li>
            </ul>
            <?php }?>