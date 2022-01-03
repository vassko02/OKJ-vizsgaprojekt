<?php
  $_SESSION['customername'] = $_POST['name'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['phonenumber'] = $_POST['tel'];
  $_SESSION['address'] = $_POST['address'];
 echo '<pre>';
 print_r($_SESSION);
 print_r($_POST);
 echo '</pre>'; 
     $services = $ServiceObj->getallservice();
?>
<form action="index.php?m=customerdetails" method="post">
    <h1>Guest informations</h1><button class="btn btn-warning" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></button>
<div class="mb-3">
  <label for="name" class="form-label">Name</label>
    <p><?php echo $_SESSION['customername'] ?></p>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email address</label>
  <p><?php echo $_SESSION['email'] ?></p>
</div>
<div class="mb-3">
  <label for="phnumber" class="form-label">Phone number</label>
  <p><?php echo $_SESSION['phonenumber'] ?></p>
</div>
<div class="mb-3">
  <label for="address" class="form-label">Address</label>
  <p><?php echo $_SESSION['address'] ?></p>
</div>
</form>
<form action="index.php?m=book" method="post">
<h1>Reservation informations</h1><button class="btn btn-warning" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></button>
<div class="mb-3">
  <label for="adult" class="form-label">Adult number</label>
  <p><?php echo $_SESSION['adult'] ?></p>
</div>
<div class="mb-3">
  <label for="chldren" class="form-label">Children number</label>
  <p><?php echo $_SESSION['children'] ?></p>
</div>
<div class="mb-3">
  <label for="checkin" class="form-label">Check-in</label>
  <p><?php echo $_SESSION['checkin'] ?></p>
</div>
<div class="mb-3">
  <label for="checkout" class="form-label">Check-out</label>
  <p><?php echo $_SESSION['checkout'] ?></p>
</div>

</form>
