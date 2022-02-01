<div class="emailaktivalas">
    <div class="aktivalasContent">
        <?php
        if (isset($_GET['email']) && isset($_GET['activation_code'])) {

            $user = $GuestObj->find_unverified_user($_GET['activation_code'], $_GET['email']);
            if ($user === null) { //rossz az email cim vagy a kod
                echo '
                    <i id="error" class="far fa-times-circle"></i>
                    <h1>Invalid link!</h1>
                    <p>The account activation has been failed or it has been already activated</p>
                    <a href="'.$baseUrl.'/">Back to the main page</a>';
            } else {
                if (md5($_GET['activation_code']) === $user['activation_code']) { //egyezik a kod es van ilyen user -> nincs hiba
                    $GuestObj->activate_user($user['CustomerID']);
                    echo '
                    <i id="success" class="far fa-check-circle"></i>
                    <h1>Successful activation!</h1>
                    <p>Now you can sign in and get full access on our website</p>
                    <a href="'.$baseUrl.'/signin">Sign in now</a>';
                } else { //rossz az email cim vagy a kod
                    echo '
                    <i id="error" class="far fa-times-circle"></i>
                    <h1>Invalid link!</h1>
                    <p>The account activation has been failed or it has been already activated</p>
                    <a href="'.$baseUrl.'/">Back to the main page</a>';
                }
            }
            //print_r($user);
            //echo '<br>';
            //echo md5($_GET['activation_code']);
            //echo '<br>';
        } 
        else  if (isset($_GET['oldemail']) && isset($_GET['newacccode'])) {

            $user = $GuestObj->find_unverified_user_fornewacc($_GET['newacccode'], $_GET['oldemail']);
            if ($user === null) { //rossz az email cim vagy a kod
                echo '
                    <i id="error" class="far fa-times-circle"></i>
                    <h1>Invalid email!</h1>
                    <p>The account activation has been failed or it has been already activated</p>
                    <a href="'.$baseUrl.'/">Back to the main page</a>';
            } else {
                if (md5($_GET['newacccode']) === $user['newacc_activation_code']) { //egyezik a kod es van ilyen user -> nincs hiba
                    $GuestObj->updateuseremail($_GET['oldemail'],$_GET['email']);
                    echo '
                    <i id="success" class="far fa-check-circle"></i>
                    <h1>Successful activation!</h1>
                    <p>Your email address have been changed!</p>
                    <a href="'.$baseUrl.'/signin">Sign in now</a>';
                    $GuestObj->activate_email();
                } else { //rossz az email cim vagy a kod
                    echo '
                    <i id="error" class="far fa-times-circle"></i>
                    <h1>Invalid link!</h1>
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
            echo '
            <i id="error" class="far fa-times-circle"></i>
            <h1>Invalid link!</h1>
            <p>The account activation has been failed or it has been already activated</p>
            <a href="'.$baseUrl.'/">Back to the main page</a>';
        }
        ?>
    </div>
</div>