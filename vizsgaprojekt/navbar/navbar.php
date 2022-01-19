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
                <button class="btn btn-dark dropdown-toggle lenyilogomb" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <?php if (isset($_SESSION['username'])) {
                       
                    }
                    else{
                        echo '<li><a class="dropdown-item" href="index.php?m=signin"><i class="fas fa-user-plus"></i> Sign in</a></li>';
                    }
                    ?>
                     <?php if (isset($_SESSION['username'])) {
                       echo'
                       <li><a class="dropdown-item" href="index.php?m=logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                       ';
                    }?>
                 
                   
                    <?php if (isset($_SESSION['username'])) {
                       echo'
                       <li class="dropdown-item" id="username">Logged in as: <span class="gold">'.$_SESSION['username'].'</span><li>
                       ';
                    }?>
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