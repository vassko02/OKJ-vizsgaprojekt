<?php 
    
    //$GuestObj->getuserbyid($username);
    

    if (isset($_POST['newaccountemail_btn'])) {
        if ($GuestObj->eemailcsekkforuseraccedit($_POST['newaccountemail'],$_SESSION['CustomerID']) > 0) {
            $emailError = "The new email address can not be the same as the old one!";
        }
        else if ($GuestObj->eemailcsekk($_POST['newaccountemail']) > 0) {
         $emailError = "Email address already taken!";
       } 
       if(isset($emailError)){
        }
        else{
          $_SESSION['newemail'] = $_POST['newaccountemail'];
            $noerror = "We have sent you an email to: ".$_SESSION['newemail'];
            $token = $GuestObj->generate_activation_code();
            $GuestObj->send_activation_emailfornewacc($_SESSION['newemail'],$token,$_SESSION['Emailforpost'],$baseUrl);
            $GuestObj->update_newacc_code_in_db($_SESSION['CustomerID'],$token);

       }

    }
    if (isset($emailError)) {
        echo '<div class="alert alert-danger mt-5 mb-0" role="alert">';
        echo $emailError;
        echo ' </div>';
    }
    if (isset($noerror)) {
        echo '<div class="alert alert-success mt-5 mb-0" role="alert">';
        echo $noerror;
        echo ' </div>';
        
    }
?>
<div class="forgotpassword mb-5">
    <h1>Email</h1>
    <div id="divider"></div>
    <form method="POST" action="">
        <div class="form-group">
            <label for="exampleInputEmail1">Please enter your new Email address</label>
            <input type="email" class="form-control" id="newaccountemail" name="newaccountemail" aria-describedby="newaccountemail" placeholder="Email adress">
        </div>
        <button type="submit" class="" name="newaccountemail_btn" id="newaccountemail_btn">SUMBIT</button>
    </form>
    <p>For further assistance, call +18143008324 or <a href="<?php echo $baseUrl?>/contactus">contact us</a>.</p>
</div>