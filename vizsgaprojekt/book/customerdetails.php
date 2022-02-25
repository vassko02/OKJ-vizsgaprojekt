<?php
if (isset($_POST['select'])) {
    $_SESSION['serviceid'] = $_POST['select'];
}
$loggedin = false;
if (isset($_SESSION['loginemail'])) {
    $loggedin = true;
    $userdetails[] = $GuestObj->findcustomerbyemail($_SESSION['loginemail']);
}

?>

<div class="guestinfo">
    <div class="keret">
        <h1 class="">Guest information</h1>
        <div class="divider"></div>
        <form action="<?php echo $baseUrl ?>/booking/confirm" method="post" class="needs-validation" needs-validation>
            <div class="d-flex">
                <div class="useradatok">
                    <div class="">
                        <label for="name" class="form-label">Name</label>
                        <input required type="text" class="form-control bg-dark text-light" placeholder="Your name" name="name" value="<?php if ($loggedin == true) {
                                                                                                                                            echo $userdetails[0]['Name'];
                                                                                                                                        } else if (isset($_SESSION['customername'])) echo $_SESSION['customername'];
                                                                                                                                        else {
                                                                                                                                        } ?>" id="name">
                    </div>
                    <div class="">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input required type="email" name="email" class="form-control bg-dark text-light" <?php if (isset($_SESSION['email']) || isset($_SESSION['loginemail'])) {echo 'readonly=readonly';}?> value="<?php if ($loggedin == true) {
                                                                                                            echo $userdetails[0]['Email'];
                                                                                                        } else if (isset($_SESSION['email'])) echo $_SESSION['email'];
                                                                                                        else {
                                                                                                        } ?>" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="">
                        <label for="tel" class="form-label">Phone number</label>
                        <input required type="tel" name="tel" class="form-control bg-dark text-light" value="<?php if ($loggedin == true) {
                                                                                                        echo $userdetails[0]['PhoneNumber'];
                                                                                                    } else if (isset($_SESSION['phonenumber'])) echo $_SESSION['phonenumber'];
                                                                                                    else {
                                                                                                    } ?>" id="tel" placeholder="+14844608072">
                    </div>
                    <div class="">
                        <label for="address" class="form-label">Address</label>
                        <input required type="text" class="form-control bg-dark text-light" value="<?php if ($loggedin == true) {
                                                                                                echo $userdetails[0]['Address'];
                                                                                            } else if (isset($_SESSION['address'])) echo $_SESSION['address'];
                                                                                            else {
                                                                                            } ?>" placeholder="3570 S Las Vegas Blvd" name="address" id="address">
                    </div>
                </div>
                <div class="usermessage">
                    <label for="message" class="form-label">Message</label>
                    <textarea cols="30" rows="10" placeholder="Any special requests for your reservation..." name="Message" id="Message" class="form-control"><?php if (isset($_SESSION['Message'])) echo $_SESSION['Message'];
                                                                                                                                                                else {
                                                                                                                                                                } ?></textarea>
                </div>
            </div>
            <div class="d-flex">
                <a href="<?php echo $baseUrl ?>/booking" name="btn_cancel" class="cancel">
                    <i class="fa-solid fa-xmark"></i> &nbsp;Cancel
                </a>
                <button type="submit" name="btn_send" class="continue">
                    Continue &nbsp;<i class="fa-solid fa-arrow-right-long"></i>
                </button>

            </div>
        </form>
    </div>
</div>