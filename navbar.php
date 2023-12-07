<nav class="navbar bg-primary navbar-dark navbar-expand-sm sticky-top">
        <a href="" class="navbar-brand"><span style="color: white;"><h4><b>Shop Site</b></h4></span></a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#n1">
            <span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse justify-content-end" id="n1">
            <ul class="navbar-nav">
                <?php if(isset($_SESSION["aid"]))
                { ?>
                    <li class="nav-item"><a href="admin_home.php" class="text-light p-2" style="font-weight:bold; font-size:20px; text-decoration:none;"> Welcome 
                    <?php echo $_SESSION["aname"]; ?></a></li>
                    <li><a href="logout.php" class="text-dark" style="font-weight:bold; font-size:20px; text-decoration:none;"> logOut </a></li>
                    <?php }else if(isset($_SESSION["reid"]))
                    { ?>
                    <li><a href="retiler_home.php" class="text-light p-2" style="font-weight:bold; font-size:20px; text-decoration:none;"> Welcome 
                        <?php echo $_SESSION["rname"]; ?></a></li>
                    <li><a href="logout.php" class="text-dark" style="font-weight:bold; font-size:20px; text-decoration:none;"> logOut </a></li>
                    <?php }
                    else if(isset($_SESSION["rid"]))
                    { ?>
                    <li class="nav-item"><a href="pro_add.php" class="nav-link text-white" style="font-weight:bold; font-size:20px;">Products</a></li>
                    <li><a href="user_home.php" class="text-light p-2 pt-2 m-3" style="font-weight:bold; font-size:20px; text-decoration:none;">
                    Welcome
                        <?php echo $_SESSION["fname"]; ?></a></li>
                    <li><a href="logout.php" class="text-dark" style="font-weight:bold; font-size:20px; text-decoration:none;"> logOut </a></li>
                    <?php }
                    else { ?>
                <li class="nav-item"><a href="index.php" class="nav-link ml-md-5 ">Home</a></li>
                <li class="nav-item"><a href="user.php" class="nav-link ml-md-5">User</a></li>
                <li class="nav-item"><a href="admin.php" class="nav-link ml-md-5">Admin</a></li>
                <!-- <li class="nav-item"><a href="pro_add.php" class="nav-link ml-md-5">Product</a></li> -->
                <li class="nav-item"><a href="" class="nav-link ml-md-5">Contact</a></li>
                  <li class="nav-item"><a href="retiler_reg.php" class="nav-link ml-md-5">Retailer</a></li>
                <?php }?>
            </ul>
        </div>    
    </nav>