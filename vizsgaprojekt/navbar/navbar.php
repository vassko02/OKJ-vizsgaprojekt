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
        <li><a href="index.php?m=home" class="navlink">Home</a></li>
        <li><a href="index.php?m=casino" class="navlink">Casino</a></li>
        <li><a href="index.php?m=book" class="navlink">Book</a></li>
        <li><a href="index.php?m=restaurant" class="navlink">Restaurant</a></li>
        <li><a href="index.php?m=contactus" class="navlink">Contact Us</a></li>
        <li class="lenyilo">
            <div class="dropdown">
                <button class="dropdown-toggle lenyilogomb" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <?php if (isset($_SESSION['username'])) {
                       
                    }
                    else{
                        echo '<li><a class="dropdown-item leftborder" href="index.php?m=signin"><i class="fas fa-user-plus"></i> Sign in</a></li>';
                    }
                    ?>
                     <?php 
                        if (isset($_SESSION['username']) && $_SESSION['username'] != 'admin') {
                            echo'
                            <li class="leftborder"><a class="dropdown-item" href="index.php?m=account"><i class="fas fa-user-cog"></i> My account</a></li>
                            <li class="leftborder"><a class="dropdown-item" href="index.php?m=reservations"><i class="fas fa-concierge-bell"></i></i> My reservations</a></li>
                            <div class="dropdown-divider"></div>
                            <li class="dropdown-item" id="username">Logged in as: <span class="gold">'.$_SESSION['username'].'</span><li>
                            <li class="leftborder"><a class="dropdown-item" href="index.php?m=logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                            ';}
                        if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin') {
                            echo'
                            <li class="leftborder"><a class="dropdown-item" href="index.php?m=admin"><i class="fas fa-tasks"></i> Manage reservations</a></li>
                            <div class="dropdown-divider"></div>
                            <li class="dropdown-item" id="username">Logged in as: <span class="gold">'.$_SESSION['username'].'</span><li>
                            <li class="leftborder"><a class="dropdown-item" href="index.php?m=logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                            ';}
                    ?>
                </ul>
            </div>
        </li>
        <div class="eltuno">
            <?php if (isset($_SESSION['username'])) {
                        
                        }
                        else{
                            echo '<li><a class="navlink" href="index.php?m=signin"><i class="fas fa-user-plus"></i> Sign in</a></li>';
                        }
                        ?>
            <?php if (isset($_SESSION['username'])) {
                       echo'
                       <li><a class="navlink" href="index.php?m=logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
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