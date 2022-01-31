<?php
  $_SESSION['customername'] = $_POST['name'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['phonenumber'] = $_POST['tel'];
  $_SESSION['address'] = $_POST['address'];
  if ($GuestObj->findcustomerbyemail($_POST['email'])== 0) {
    $GuestObj->savecustomer($_POST);
  }
  else{
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
  $diff = date_diff($date1,$date2);

  
  $_SESSION['fullprice'] = (($_SESSION['serviceprice']+$_SESSION['RoomPrice'])* $diff->format("%a"))*$_SESSION['multiplier'];
  $hundred = 100;


 
?>
<body>
  
<form action="<?php echo $baseUrl?>/booking/customerdetails" class="text-center" method="post">
  <div class="row  mx-auto mt-5 mb-5 "><h1 class="col ">Guest informations</h1>
</div>
  

<div class="mb-3 keret">
  <label for="name" class="form-label">Name: </label>
    <span><?php echo $_SESSION['customername'] ?></span>
</div>
<div class="mb-3 keret">
  <label for="exampleFormControlInput1" class="form-label">Email address:</label>
  <span><?php echo $_SESSION['email'] ?></span>
</div>
<div class="mb-3 keret">
  <label for="phnumber" class="form-label">Phone number:</label>
  <span><?php echo $_SESSION['phonenumber'] ?></span>
</div>
<div class="mb-3 keret">
  <label for="address" class="form-label">Address:</label>
  <span><?php echo $_SESSION['address'] ?></span>
</div>
<button class="btn btn-warning edit mt-3 col keret" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg> Edit</button>
</form>
<form action="<?php echo $baseUrl?>/booking" class="text-center" method="post">
<div class="rowmx-auto mt-5 mb-5"><h1 class="col ">Reservation informations</h1>
</div>
<div class="mb-3 keret">
  <label for="roomname" class="form-label">Room Type:</label>
  <span><?php echo $_SESSION['roomname']; echo' $'.$_SESSION['RoomPrice'].'  /night'?></span>
</div>
<div class="mb-3 keret">
  <label for="type" class="form-label">Service Type: </label>
    <span><?php foreach ($servicebyid as $oneservice) {
      echo $oneservice['ServiceType']; echo' $'.$oneservice['ServicePrice'].'/night';
      
    }
     ?></span>
</div>
<div class="mb-3 keret">
  <label for="adult" class="form-label">Adult number:</label>
  <span><?php echo $_SESSION['adult'] ?></span>
</div>
<div class="mb-3 keret">
  <label for="chldren" class="form-label">Children number:</label>
  <span><?php echo $_SESSION['children'] ?></span>
</div>
<div class="mb-3 keret">
  <label for="checkin" class="form-label">Check-in:</label>
  <span><?php echo $_SESSION['checkin'] ?></span>
</div>
<div class="mb-3 keret">
  <label for="checkout" class="form-label">Check-out:</label>
  <span><?php echo $_SESSION['checkout'] ?></span>
</div>
<div class="mb-3 keret">
  <label for="fullprice" class="form-label">Full Price:</label>
  <span> $<?php echo ''.$_SESSION['fullprice'].' -   '.$_SESSION['discount'].'% DISCOUNT  ';?></span>
</div>
<input type="hidden" id="Edit" name="Edit" value="<?php echo $edit?>">
<button class="btn btn-warning mt-3 edit col keret" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg> Edit</button>
</form>
<form action="<?php echo $baseUrl?>/booking/resconfirm" method="post">
  <input type="hidden" name="CustomerID" value="<?php 
  if (isset($_POST['customerid'])) {
    echo $_POST['customerid'];
  }?>">
  <button class="btn btn-warning mt-3 edit col keret" name="btn_send2" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
    <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
  </svg> Finalize reservation </button>

</form>

</body>

