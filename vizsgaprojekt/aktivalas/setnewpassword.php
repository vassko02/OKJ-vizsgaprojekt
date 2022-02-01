<div class="newpassword">
    <?php
    if (isset($_POST['newPassword']) && isset($_POST['newPasswordAgain']) && isset($_POST['CustomerID']) && isset($_POST['Email'])) {
        $newPasswordValid = $GuestObj->verify_new_password($_POST['newPassword'], $_POST['CustomerID']);
        if ($newPasswordValid === null) {
            //print_r($newPasswordValid);
            echo '
            <div id="newPasswordSet">
                <h1>Password could not be changed!</h1>
                <p>It seems like your new password matches your old one, so we did not change it.</p>
                <div class="row">
                    <a id="passwordMatch1" class="col-sm-12 col-lg-4" href="'.$baseUrl.'/passwordreset?email='.$_POST['Email'].'&password_reset_token='.$_POST['reset_token'].'">Set new password</a>
                    <a id="passwordMatch2" class="col-sm-12 col-lg-4" href="'.$baseUrl.'/signin">Sign in</a>
                </div>
            </div>
            ';
        }
        else {
            $GuestObj->set_new_password($_POST['newPassword'], $_POST['CustomerID']);
            echo '
            <div id="newPasswordSet">
                <h1>Your password has been changed!</h1>
                <p>Now you can sign in with your new password.</p>
                <a href="'.$baseUrl.'/signin">Sign in</a>
            </div>';
        }
    }
    else if (isset($_GET['email']) && isset($_GET['password_reset_token'])) {
        $user = $GuestObj->find_resetable_user($_GET['password_reset_token'], $_GET['email']);
        //print_r($user);
        if ($user == null) {
            echo '
            <div id="errorNewPassword">
                <h1>The link is invalid or the token is expired!</h1>
                <p>Something might have gone wrong...</p>
                <a href="'.$baseUrl.'/">Back to the main page</a>
            </div>';
        } else {
            echo '
                <div class="row">
                    <h1 class="col-sm-12 col-lg-6">Set new password</h1>
                    <h1 class="col-sm-12 col-lg-6">'.$user['Email'].'</h1>
                </div>
                <div id="divider"></div>
                <div class="row">
                    <form class="col-sm-12 col-lg-7" action="'.$baseUrl.'/passwordreset?email" method="POST">
                        <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            <input type="password" name="newPassword" class="form-control" id="exampleInputPassword1" placeholder="New Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1-confirmation">New Password Again</label>
                            <input type="password" name="newPasswordAgain" class="form-control" id="exampleInputPassword1-confirmation" placeholder="New Password Again">
                        </div>
                        <input type="hidden" name="CustomerID" value="'.$user['CustomerID'].'">
                        <input type="hidden" name="Email" value="'.$user['Email'].'">
                        <input type="hidden" name="reset_token" value="'.$_GET['password_reset_token'].'">
                        <button id="submit" type="submit" class="" disabled>Submit</button>
                    </form>
                    <div class="col-sm-12 col-lg-5" id="validator-output"></div>
                </div>
                
              </div>';
        }
    } else {
        echo '
        <div id="errorNewPassword">
            <h1>The link is invalid!</h1>
            <p>Something might have gone wrong...</p>
            <a href="'.$baseUrl.'/">Back to the main page</a>
        </div>';
    }
    ?>
</div>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js'></script>
<script  src="./aktivalas/script.js"></script>