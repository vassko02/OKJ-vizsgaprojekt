<div style="color: white;">
    <?php
    if (isset($_GET['email']) && isset($_GET['activation_code'])) {

        $user = $GuestObj->find_unverified_user($_GET['activation_code'], $_GET['email']);
        if ($user === null) {
            echo 'Nincs ilyen user az adatbázisban!';
        }
        else {
            //echo $user['activation_code'];
            if (md5($_GET['activation_code']) === $user['activation_code'])
            {
                $GuestObj->activate_user($user['CustomerID']);
                echo 'Sikeresen aktiválta a fiókját!';
            }
            else {
                echo 'Rossz email címet vagy aktiváló kódot adott meg!';
            }
        }
        //print_r($user);
        //echo '<br>';
        //echo md5($_GET['activation_code']);
        //echo '<br>';
        
        //if user exists and activate the user successfully
        
    }
    else {
        echo 'Nincs hozzaferese az oldalhoz!';
    }
    //redirect to the register page in other cases

    ?>
</div>