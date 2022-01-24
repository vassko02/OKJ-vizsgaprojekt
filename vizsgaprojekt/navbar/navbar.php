<nav>
    <div class="logo">
        <img class="kep" alt="Logo Image">
    </div>
    <div class="hamburger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
    <ul class="navlinks">
        <li><a href="<?php echo $baseUrl?>/" class="navlink">Home</a></li>
        <li><a href="<?php echo $baseUrl?>/gambling" class="navlink">Casino</a></li>
        <li><a href="<?php echo $baseUrl?>/booking" class="navlink">Book</a></li>
        <li><a href="<?php echo $baseUrl?>/dining" class="navlink">Restaurant</a></li>
        <li><a href="<?php echo $baseUrl?>/contactus" class="navlink">Contact Us</a></li>
        <li class="lenyilo">
            <div class="dropdown">
                <button class="dropdown-toggle lenyilogomb" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <?php if (isset($_SESSION['username'])) {
                       
                    }
                    else{
                        echo '<li><a class="dropdown-item leftborder" href="'.$baseUrl.'/signin"><i class="fas fa-user-plus"></i> Sign in</a></li>';
                    }
                    ?>
                     <?php 
                        if (isset($_SESSION['username']) && $_SESSION['isadmin'] != '1') {
                            echo'
                            <li class="leftborder"><a class="dropdown-item" href="'.$baseUrl.'/account"><i class="fas fa-user-cog"></i> My account</a></li>
                            <li class="leftborder"><a class="dropdown-item" href="'.$baseUrl.'/reservations"><i class="fas fa-concierge-bell"></i></i> My reservations</a></li>
                            <div class="dropdown-divider"></div>
                            <li class="dropdown-item" id="username">Logged in as: <span class="gold">'.$_SESSION['username'].'</span><li>
                            <li class="leftborder"><a class="dropdown-item" href="'.$baseUrl.'/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                            ';}
                        if (isset($_SESSION['username']) && $_SESSION['isadmin'] == '1') {
                            echo'
                            <li class="leftborder"><a class="dropdown-item" href="'.$baseUrl.'/admin"><i class="fas fa-tasks"></i> Manage reservations</a></li>
                            <li class="leftborder"><a class="dropdown-item" href="'.$baseUrl.'/userseditadmin"><i class="fas fa-tasks"></i> Manage users</a></li>
                            <div class="dropdown-divider"></div>
                            <li class="dropdown-item" id="username">Logged in as: <span class="gold">'.$_SESSION['username'].'</span><li>
                            <li class="leftborder"><a class="dropdown-item" href="'.$baseUrl.'/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                            ';}
                    ?>
                </ul>
            </div>
        </li>
        <div class="eltuno">
            <?php if (isset($_SESSION['username'])) {
                        
                        }
                        else{
                            echo '<li><a class="navlink" href="'.$baseUrl.'/signin"><i class="fas fa-user-plus"></i> Sign in</a></li>';
                        }
                        ?>
            <?php if (isset($_SESSION['username'])) {
                if (isset($_SESSION['username']) && $_SESSION['isadmin'] == '1') {
                    echo'
                    <li><a class="navlink" href="'.$baseUrl.'/admin"><i class="fas fa-sign-out-alt"></i> Manage reservations</a></li>
                    <li><a class="navlink" href="'.$baseUrl.'/userseditadmin"><i class="fas fa-sign-out-alt"></i>  Manage users</a></li>';
                }
                if (isset($_SESSION['username']) && $_SESSION['isadmin'] != '1') {

                    echo'
                    <li><a class="navlink" href="'.$baseUrl.'/account"><i class="fas fa-sign-out-alt"></i>  My account</a></li>
                    <li><a class="navlink" href="'.$baseUrl.'/reservations"><i class="fas fa-sign-out-alt"></i> My reservations</a></li>';
                
                }
                echo'
                    <li><a class="navlink" href="'.$baseUrl.'/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    ';
            }?>
            <?php if (isset($_SESSION['username'])) {
                       echo'
                       <li id="username">Logged in as: <span class="gold">'.$_SESSION['username'].'</span><li>
                       ';
                    }?>
        </div>
    </ul>
</nav>