<?php
$_SESSION['customername'] = $_POST['name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['phonenumber'] = $_POST['tel'];
$_SESSION['address'] = $_POST['address'];
$_SESSION['Message'] = $_POST['Message'];
if ($GuestObj->findcustomerbyemail($_POST['email']) == 0) {
  $GuestObj->savecustomer($_POST);
} else {
  $GuestObj->updatecustomer($_POST);
}
$customer = $GuestObj->findcustomerbyemail($_POST['email']);
$_SESSION['customerid'] = $customer['CustomerID'];

$edit = 'true';

$services = $ServiceObj->getallservice();
$servicebyid = $ServiceObj->getservicebyid($_SESSION['serviceid']);

foreach ($servicebyid as $oneservice) {
  $_SESSION['serviceprice'] = $oneservice['ServicePrice'];
}
$date1 = date_create($_SESSION['checkin']);
$date2 = date_create($_SESSION['checkout']);
$diff = date_diff($date1, $date2);


if (isset($_SESSION['multiplier'])) {
  $_SESSION['fullprice'] = (($_SESSION['serviceprice'] + $_SESSION['RoomPrice']) * $diff->format("%a")) * $_SESSION['multiplier'];
} else {
  $_SESSION['fullprice'] = (($_SESSION['serviceprice'] + $_SESSION['RoomPrice']) * $diff->format("%a")) * 1;
}
$hundred = 100;



?>
<div id="hatter">
  <div id="keret">
    <form action="<?php echo $baseUrl ?>/booking" method="post" id="baloldal">
      <div class="header">
        <h1 class="">Reservation informations</h1>
      </div>
      <div class="divider"></div>
      <div class="details">
        <div class="">
          <label for="checkin" class="form-label">Check-in:</label>
          <span><?php echo $_SESSION['checkin'] ?></span>
        </div>
        <div class="">
          <label for="checkout" class="form-label">Check-out:</label>
          <span><?php echo $_SESSION['checkout']; ?></span>
        </div>
        <div class="">
          <label class="form-label">Nights:</label>
          <span><?php echo $diff->format("%a"); ?></span>
        </div>
        <div class="smalldivider"></div>
        <div class="">
          <label for="adult" class="form-label">Adults:</label>
          <span><?php echo $_SESSION['adult'] ?></span>
        </div>
        <div class="">
          <label for="chldren" class="form-label">Children:</label>
          <span><?php echo $_SESSION['children'] ?></span>
        </div>
        <div class="">
          <label for="roomname" class="form-label">Room Type:</label>
          <span><?php echo $_SESSION['roomname']; ?></span>
        </div>
        <div class="">
          <label for="type" class="form-label">Service Type: </label>
          <span><?php foreach ($servicebyid as $oneservice) {
                  echo $oneservice['ServiceType'];
                }
                ?></span>
        </div>
        <div class="smalldivider"></div>
        <div class="price">
          <div>
            <label class="form-label">Room price:</label>
            <span><?php echo ' $' . $_SESSION['RoomPrice'] . '/night'; ?></span>
          </div>
          <div class="">
            <label class="form-label">Service Price: </label>
            <span><?php foreach ($servicebyid as $oneservice) {
                    echo ' $' . $oneservice['ServicePrice'] . '/night';
                  }
                  ?></span>
          </div>
          <div>
            <label class="form-label">Discount:</label>
            <span><?php if (isset($_SESSION['discount'])) {
                    echo $_SESSION['discount'] . '%';
                  } else {
                    echo '0%';
                  } ?></span>
          </div>
          <div class="">
            <label for="fullprice" class="form-label">Total Price:</label>
            <span> $<?php echo $_SESSION['fullprice']; ?>
            </span>
          </div>
          <div class="smalldivider"></div>
        </div>
      </div>
      <input type="hidden" id="Edit" name="Edit" value="<?php echo $edit ?>">
      <button class="edit" type="submit"><i class="fas fa-edit"></i> Edit reservation</button>
    </form>

    <div id="jobboldal">
      <form action="<?php echo $baseUrl ?>/booking/customerdetails" method="post">
        <div class="">
          <h1 class=" ">Guest informations</h1>
        </div>
        <div class="divider"></div>
        <div class="">
          <label for="name" class="form-label">Name: </label>
          <span><?php echo $_SESSION['customername'] ?></span>
        </div>
        <div class="">
          <label for="exampleFormControlInput1" class="form-label">Email address:</label>
          <span><?php echo $_SESSION['email'] ?></span>
        </div>
        <div class="">
          <label for="phnumber" class="form-label">Phone number:</label>
          <span><?php echo $_SESSION['phonenumber'] ?></span>
        </div>
        <div class="">
          <label for="address" class="form-label">Address:</label>
          <span><?php echo $_SESSION['address'] ?></span>
        </div>
        <div class="">
          <label for="message" class="form-label">Your message:</label>
          <span><?php echo $_SESSION['Message'] ?></span>
        </div>
        <div class="smalldivider"></div>
        <button class="edit" type="submit"><i class="fas fa-edit"></i> Edit guest informations</button>
      </form>

      <form action="<?php echo $baseUrl ?>/booking/resconfirm" method="post" class="needs-validation" id="finalizeres">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
          <label class="form-check-label" for="invalidCheck" id="terms">
            By checking this box, you are agreeing to our <a target="_blank" href="<?php echo $baseUrl?>/tos">Terms and Conditions</a> and <a target="_blank" href="<?php echo $baseUrl?>/privacypolicy">Privacy Policy</a>.
          </label>
          <div class="invalid-feedback">
            You must agree before submitting.
          </div>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox">
          <label class="form-check-label">
            Subscribe to our newsletter.
          </label>
        </div>
        <input type="hidden" name="CustomerID" value="<?php
                                                      if (isset($_POST['customerid'])) {
                                                        echo $_POST['customerid'];
                                                      } ?>">
        <button class="finalize" name="btn_send2" type="submit"><i class="fas fa-check-circle"></i> Finalize reservation</button>
      </form>
    </div>
  </div>
</div>