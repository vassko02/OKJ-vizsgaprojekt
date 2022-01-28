<?php 
    if (isset($emailError)) {
        echo '<div class="alert alert-danger mt-5 mb-0" role="alert">';
        echo $emailError;
        echo ' </div>';
    }
?>
<div class="forgotpassword">
    <h1>Reset password</h1>
    <form method="POST" action="<?php echo $baseUrl?>/forgotpassword">
        <div class="form-group">
            <label for="exampleInputEmail1">Please enter your Email address</label>
            <input type="email" class="form-control" id="resetEmail" name="resetEmail" aria-describedby="emailHelp" placeholder="Email adress">
        </div>
        <button type="submit" class="" name="reset_password" id="reset_password">SUMBIT</button>
    </form>
    <p>For further assistance, call +18143008324 or <a href="<?php echo $baseUrl?>/contactus">contact us</a>.</p>
</div>