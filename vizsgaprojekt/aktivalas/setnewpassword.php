<div class="newpassword">
    <?php
    if (isset($_GET['email']) && isset($_GET['password_reset_token'])) {
        $user = $GuestObj->find_resetable_user($_GET['password_reset_token'], $_GET['email']);
        //print_r($user);
        if ($user == null) {
            echo '
            <div id="errorNewPassword">
                <h1>The link is invalid or the token is expired!</h1>
                <a href="'.$baseUrl.'/">Back to the main page</a>
            </div>';
        } else {
            echo '
                <div class="row">
                    <h1 class="col-sm-12 col-lg-6">Set new password</h1>
                    <h3 class="col-sm-12 col-lg-6">'.$user['Email'].'</h3>
                </div>
                <form>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="New Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1-confirmation">New Password Again</label>
                    <input type="password" class="form-control" id="exampleInputPassword1-confirmation" placeholder="New Password Again">
                  </div>
                  <input type="hidden" value="'.$user['CustomerID'].'">
                  <button id="submit" type="submit" class="" disabled>Submit</button>
                </form>
                <div id="validator-output"></div>
              </div>';
        }
    } else {
        echo '
        <div id="errorNewPassword">
            <h1>The link is invalid!</h1>
            <a href="'.$baseUrl.'/">Back to the main page</a>
        </div>';
    }
    ?>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js'></script>
<script  src="./aktivalas/script.js"></script>