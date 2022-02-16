<?php
defined('VEDETT') or die(' ísx');
?>
<div class="row">
  <?php
  if (isset($_POST['deletee'])) {
    $_SESSION['reservationid'] = $_POST['reservationid'];
    $ReservationObj->deleteconsumption($_SESSION['reservationid']);
    $ReservationObj->deletereservation($_SESSION['reservationid']);
    $user =  $GuestObj->getuserbyid($_SESSION['username']);
    $LogObj->savelog($user['Name'],"Deleted a reservation","Reservation",$_SESSION['reservationid']);
  }
  $empty = false;
  $reservations[] = $ReservationObj->selectallreservation();
  $allrooms = $RoomObj->selectallrooms();
  $services = $ServiceObj->getallservice();
  $counter = 0;
  $counter2 = 0;
  $user =  $GuestObj->getuserbyid($_SESSION['username']);
  $today = date("Y-m-d");

  foreach ($reservations as $onereservation) {
    foreach ($onereservation as $oneonereservation) {
      if ($oneonereservation['CustomerID'] == $user['CustomerID']) {
        $roomname =  $RoomObj->selectoneroomname($oneonereservation['RoomID']);
        $servicee = $ServiceObj->getservicebyid($oneonereservation['ServiceID']);
        $room[] = $RoomObj->selectoneroom2($oneonereservation['RoomID']);
        echo '
       <div class="container" id="container">
       <form id="reservation" class="neon1" action="" method="POST">
         <h3>' . $oneonereservation['Name'] . '</h3>
         <h4 class="resemail">' . $oneonereservation['Email'] . '</h4>
         <div class="dropdown-divider"></div>
         <input type="hidden" name="customerid" value="' . $oneonereservation['CustomerID'] . '"/>
         <input type="hidden" name="guestnumber" value="' . $oneonereservation['GuestNumber'] . '"/>
         <input type="hidden" name="reservationid" value="' . $oneonereservation['ReservationID'] . '"/>
         <input type="hidden" name="price" value="' . $oneonereservation['Price'] . '"/>
         <fieldset>
         <h4 for="">Room type</h4>
         <p class="form-control">' . $roomname['RoomName'] . '</p>
    
    
    
    
         </fieldset>
         <fieldset>
         <h4 for="">Service type</h4>
         <p class="form-control">' . $servicee[0]['ServiceType'] . '</p>
         </fieldset>
         <fieldset>
          <h4 for="">Check in - Check out</h4>
          <p class="form-control" tabindex="2">' . $oneonereservation['ArrivalDate'] . '</p>
          <p class="form-control" tabindex="3">' . $oneonereservation['LeavingDate'] . '</p>
         </fieldset>
         <fieldset>
          <h4 for="">Adults</h4>
          <p class="form-control" tabindex="3">' . $oneonereservation['Adults'] . '</p>
          <h4 for="">Children</h4>
          <p class="form-control" tabindex="3">' . $oneonereservation['Children'] . '</p>
         </fieldset>
         <fieldset>
          <h4 for="">Message</h4>
          <textarea placeholder="Type your Message Here...." tabindex="5" ></textarea>
         </fieldset>
         <fieldset>
         ';
        if ($today < $oneonereservation['ArrivalDate']) {
          echo '<a href="' . $baseUrl . '/delete" class="btn btn-danger w-100 delet"   data-bs-toggle="modal" data-bs-target="#deleteconfirm">Delete</a>';
        }
        echo '
         </fieldset>
         <div class="modal fade text-dark"  id="deleteconfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-dark" id="staticBackdropLabel" >Please confirm</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Are you sure you want to delete?
            </div>
            <div class="modal-footer">
              <button  class="btn btn-secondary w-25 no" data-bs-dismiss="modal">No</button>
              <button name="deletee" type="submit" class="btn btn-primary w-25 deletee" id="btnYes">Yes</button>
            </div>
          </div>
        </div>
        </div>
          </form>
        
        
        </div>
    
       ';
       $empty = true;
      } 

      $counter += 1;
    }
  }
  if ($empty == false) {
    echo '
      <div class="donthaveres">
  <h1 id="nagytitle">You do not have any reservation at the moment!</h1>
  <h4><a href="' . $baseUrl . '/booking">Make a reservation...</a></h4>
  </div>
  ';
  }
  ?>
</div>