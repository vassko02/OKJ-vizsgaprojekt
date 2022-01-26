<div class="emailaktivalas">
    <div class="aktivalasContent">
        <?php
        if (isset($_GET['email']) && isset($_GET['activation_code'])) {

            $user = $GuestObj->find_unverified_user($_GET['activation_code'], $_GET['email']);
            if ($user === null) { //rossz az email cim vagy a kod
                echo '<h2>Invalid link!</h2>
                    <p>The account activation has been failed or it has been already activated</p>
                    <a href="'.$baseUrl.'/">Back to the main page</a>';
            } else {
                if (md5($_GET['activation_code']) === $user['activation_code']) { //egyezik a kod es van ilyen user -> nincs hiba
                    $GuestObj->activate_user($user['CustomerID']);
                    echo '<h2>Successful activation!</h2>
                    <p>Now you can sign in and get full access on our website</p>
                    <a href="'.$baseUrl.'/signin">Sign in now</a>';
                } else { //rossz az email cim vagy a kod
                    echo '<h2>Invalid link!</h2>
                    <p>The account activation has been failed or it has been already activated</p>
                    <a href="'.$baseUrl.'/">Back to the main page</a>';
                }
            }
            //print_r($user);
            //echo '<br>';
            //echo md5($_GET['activation_code']);
            //echo '<br>';
        } 
        else { //az a link
            echo '<h2>Invalid link!</h2>
            <p>The account activation has been failed or it has been already activated</p>
            <a href="'.$baseUrl.'/">Back to the main page</a>';
        }
        ?>
    </div>
</div>