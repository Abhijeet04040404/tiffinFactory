<div class="container">
    <div class="top-header">
        <div class="logo">
            <a href="index.php"><strong style="color: red;font-size: 24px">Tiffin</strong><strong style="color: green;font-size: 24px;padding-left: 5px">Factory</strong></a>
        </div>
        <div class="logo-img">
            <a href="index.php">
                <img class="tflogoimg" src="images/pagelogo.ico" alt="Logo">
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="menu-bar">
    <div class="container">
        <div class="top-menu">
            <ul>
                <li class="active"><a href="index.php">Home</a></li><span style="color:darkgray ;"><strong>|</strong></span>
                <li><a href="about-us.php">About Us</a></li>
                <li><a href="contact-us.php">contact Us</a></li>

                <?php if (strlen($_SESSION['otssuid'] != 0)) { ?> <li><a href="my-order.php">My Order</a></li>|<?php } ?>
                    <!-- <?php if (strlen($_SESSION['otssuid'] == 0)) { ?><li><a href="admin/login.php">Admin</a></li><?php } ?> -->

                    <div class="clearfix"></div>
            </ul>
        </div>
        <div class="login-section">
            <ul>
                <?php if (strlen($_SESSION['otssuid'] == 0)) { ?>
                    <li><a href="login.php">Login</a> </li> <span style="color:darkgray ;"><strong>|</strong></span>
                    <li><a href="register.php">Register</a> </li> |
                <?php } ?>
                <?php if (strlen($_SESSION['otssuid'] != 0)) { ?>
                    <li><a href="myprofile.php">My Profile</a> </li> |
                    <li><a href="change-password.php">Change Password</a> </li> |
                    <li><a href="logout.php">Logout</a> </li> |<?php } ?>
                    <div class="clearfix"></div>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>