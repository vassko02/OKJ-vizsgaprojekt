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
        <button class="edit" type="submit"><i class="fas fa-edit"></i> Edit</button>
      </div>
      <div class="divider"></div>
      <div class="details">
        <div class="">
          <label for="checkin" class="form-label">Check-in:</label>
          <p><?php echo $_SESSION['checkin'] ?></p>
        </div>
        <div class="">
          <label for="checkout" class="form-label">Check-out:</label>
          <p><?php echo $_SESSION['checkout']; ?></p>
        </div>
        <div class="">
          <label class="form-label">Nights:</label>
          <p><?php echo $diff->format("%a"); ?></p>
        </div>
        <div class="smalldivider"></div>
        <div class="">
          <label for="adult" class="form-label">Adults:</label>
          <p><?php echo $_SESSION['adult'] ?></p>
        </div>
        <div class="">
          <label for="chldren" class="form-label">Children:</label>
          <p><?php echo $_SESSION['children'] ?></p>
        </div>
        <div class="" id="szobanev">
          <label for="roomname" class="form-label">Room Type:</label>
          <p><?php echo $_SESSION['roomname']; ?></p>
        </div>
        <div class="">
          <label for="type" class="form-label">Service Type: </label>
          <p><?php foreach ($servicebyid as $oneservice) {
                echo $oneservice['ServiceType'];
              }
              ?></p>
        </div>
        <div class="smalldivider"></div>
        <div class="price">
          <div>
            <label class="form-label">Room price:</label>
            <p><?php echo ' $' . $_SESSION['RoomPrice'] . '/night'; ?></p>
          </div>
          <div class="">
            <label class="form-label">Service Price: </label>
            <p><?php foreach ($servicebyid as $oneservice) {
                  echo ' $' . $oneservice['ServicePrice'] . '/night';
                }
                ?></p>
          </div>
          <div>
            <label class="form-label">Discount:</label>
            <p><?php if (isset($_SESSION['discount'])) {
                  echo $_SESSION['discount'] . '%';
                } else {
                  echo '0%';
                } ?></p>
          </div>
          <div class="totalprice">
            <label for="fullprice" class="form-label">Total Price:</label>
            <p> $<?php echo $_SESSION['fullprice']; ?>
            </p>
          </div>
          <div class="smalldivider"></div>
        </div>
      </div>
      <input type="hidden" id="Edit" name="Edit" value="<?php echo $edit ?>">
    </form>

    <div id="jobboldal">
      <form action="<?php echo $baseUrl ?>/booking/customerdetails" method="post">
        <div class="header">
          <h1 class=" ">Guest informations</h1>
          <button class="edit" type="submit"><i class="fas fa-edit"></i> Edit</button>
        </div>
        <div class="divider"></div>
        <div class="details">
          <div class="">
            <label for="name" class="form-label">Name: </label>
            <p><?php echo $_SESSION['customername'] ?></p>
          </div>
          <div class="">
            <label for="exampleFormControlInput1" class="form-label">Email address:</label>
            <p><?php echo $_SESSION['email'] ?></p>
          </div>
          <div class="">
            <label for="phnumber" class="form-label">Phone number:</label>
            <p><?php echo $_SESSION['phonenumber'] ?></p>
          </div>
          <div class="">
            <label for="address" class="form-label">Address:</label>
            <p><?php echo $_SESSION['address'] ?></p>
          </div>
          <div id="uzenet">
            <div class="collapsible">
              <span>Message:</span>
              <span id="vanszem">Click to show&nbsp;<i class="fa-regular fa-eye"></i></span>
              <span id="nincsszem" class="d-none">Click to hide&nbsp;<i class="fa-regular fa-eye-slash"></i></span>
            </div>
            <div class="content">
              <p><?php echo $_SESSION['Message'] ?></p>
            </div>
            <!-- <details>
              <summary>Message</summary>
              <p></p>
            </details> -->
          </div>
        </div>
        <div class="smalldivider"></div>

      </form>

      <form action="<?php echo $baseUrl ?>/booking/resconfirm" method="post" class="needs-validation" id="finalizeres">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
          <label class="form-check-label" for="invalidCheck" id="terms">
            By checking this box, you are agreeing to our <a target="_blank" href="<?php echo $baseUrl ?>/tos">Terms and Conditions</a> and <a target="_blank" href="<?php echo $baseUrl ?>/privacypolicy">Privacy Policy</a>.
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
        <div class="d-flex">
          <a href="<?php echo $baseUrl ?>/booking" name="btn_cancel" class="cancel">
            <i class="fa-solid fa-xmark"></i> &nbsp;Cancel
          </a>
          <button class="finalize" name="btn_send2" type="submit"><i class="fas fa-check-circle"></i> &nbsp;Finalize reservation</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>


var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
      vanszem.classList.toggle('d-none');
      nincsszem.classList.toggle('d-none');
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
      vanszem.classList.toggle('d-none');
      nincsszem.classList.toggle('d-none');
    } 
  });
}
</script>